<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("
            CREATE OR REPLACE VIEW v_product_list AS
            SELECT
                p.id          AS product_id,
                p.name        AS product_name,
                p.slug        AS product_slug,
                p.price,
                p.unit,
                p.size_variant,
                p.estimated_duration,
                p.description AS product_description,
                sc.id         AS category_id,
                sc.name       AS category_name,
                sc.slug       AS category_slug,
                sc.icon       AS category_icon,
                sc.type       AS service_type,
                sc.description AS category_description
            FROM products p
            JOIN service_categories sc ON p.category_id = sc.id
            WHERE p.is_active = 1 AND sc.is_active = 1
            ORDER BY sc.type, sc.sort_order, p.sort_order
        ");
        DB::statement("
            CREATE OR REPLACE VIEW v_category_price_range AS
            SELECT
                sc.id,
                sc.name,
                sc.slug,
                sc.icon,
                sc.type,
                sc.description,
                sc.sort_order,
                MIN(p.price)  AS price_from,
                MAX(p.price)  AS price_max,
                COUNT(p.id)   AS total_products,
                (SELECT p2.unit FROM products p2
                 WHERE p2.category_id = sc.id AND p2.is_active = 1
                 LIMIT 1)     AS unit
            FROM service_categories sc
            LEFT JOIN products p ON p.category_id = sc.id AND p.is_active = 1
            WHERE sc.is_active = 1
            GROUP BY sc.id, sc.name, sc.slug, sc.icon,
                     sc.type, sc.description, sc.sort_order
            ORDER BY sc.type, sc.sort_order
        ");
        DB::statement("
            CREATE OR REPLACE VIEW v_order_tracking AS
            SELECT
                o.order_number,
                o.tracking_token,
                o.customer_name,
                o.status,
                o.status_note,
                o.total_items,
                o.total_price,
                o.payment_status,
                st.name                       AS service_type_name,
                st.estimated_duration         AS service_estimated_duration,
                o.estimated_done_at,
                o.completed_at,
                o.picked_up_at,
                o.created_at                  AS order_date,
                CASE o.status
                    WHEN 'pending'    THEN 'Pesanan diterima, menunggu diproses'
                    WHEN 'processing' THEN 'Sedang dalam proses cuci/setrika'
                    WHEN 'done'       THEN 'Selesai, siap diambil'
                    WHEN 'picked_up'  THEN 'Sudah diambil oleh pelanggan'
                    WHEN 'cancelled'  THEN 'Pesanan dibatalkan'
                END                           AS status_description,
                CASE o.status
                    WHEN 'pending'    THEN 'ðŸ•'
                    WHEN 'processing' THEN 'ðŸ”„'
                    WHEN 'done'       THEN 'âœ…'
                    WHEN 'picked_up'  THEN 'ðŸ“¦'
                    WHEN 'cancelled'  THEN 'âŒ'
                END                           AS status_icon
            FROM orders o
            LEFT JOIN service_types st ON o.service_type_id = st.id
        ");
        DB::statement("
            CREATE OR REPLACE VIEW v_live_statistics AS
            SELECT 'total_orders_completed' AS stat_key,
                   CAST(COUNT(*) AS CHAR)   AS stat_value,
                   'Pesanan Selesai'         AS stat_label,
                   'fa-check-circle'         AS stat_icon
            FROM orders WHERE status IN ('done', 'picked_up')

            UNION ALL

            SELECT 'total_customers',
                   CAST(COUNT(*) AS CHAR),
                   'Pelanggan Terdaftar',
                   'fa-users'
            FROM customers WHERE is_active = 1

            UNION ALL

            SELECT 'total_service_categories',
                   CAST(COUNT(*) AS CHAR),
                   'Kategori Layanan',
                   'fa-list'
            FROM service_categories WHERE is_active = 1

            UNION ALL

            SELECT 'total_products',
                   CAST(COUNT(*) AS CHAR),
                   'Produk Layanan',
                   'fa-tags'
            FROM products WHERE is_active = 1
        ");

        DB::statement("
            CREATE OR REPLACE VIEW v_faq_active AS
            SELECT id, question, answer, category, icon, sort_order
            FROM faq
            WHERE is_active = 1
            ORDER BY sort_order
        ");

        DB::statement("
            CREATE OR REPLACE VIEW v_testimonials_active AS
            SELECT id, customer_name, customer_title, content,
                   rating, avatar, sort_order
            FROM testimonials
            WHERE is_active = 1
            ORDER BY sort_order
        ");
        DB::statement("
            CREATE OR REPLACE VIEW v_operating_hours AS
            SELECT
                day_of_week,
                day_name,
                CASE
                    WHEN is_closed = 1
                    THEN 'Tutup'
                    ELSE CONCAT(DATE_FORMAT(open_time, '%H:%i'), ' - ',
                                DATE_FORMAT(close_time, '%H:%i'))
                END  AS hours,
                is_closed,
                note
            FROM operating_hours
            ORDER BY day_of_week
        ");
        DB::unprepared("
            CREATE PROCEDURE `sp_generate_order_number`(OUT new_order_number VARCHAR(30))
            BEGIN
                DECLARE today_date VARCHAR(8);
                DECLARE order_count INT;

                SET today_date = DATE_FORMAT(NOW(), '%Y%m%d');

                SELECT COUNT(*) + 1 INTO order_count
                FROM `orders`
                WHERE DATE(created_at) = CURDATE();

                SET new_order_number = CONCAT('RODEO-', today_date, '-', LPAD(order_count, 4, '0'));
            END
        ");
        DB::unprepared("
            CREATE PROCEDURE `sp_generate_tracking_token`(OUT new_token VARCHAR(64))
            BEGIN
                SET new_token = CONCAT('TRK-', MD5(CONCAT(NOW(), RAND(), UUID())));
            END
        ");
        DB::unprepared("
            CREATE PROCEDURE `sp_update_statistics_cache`()
            BEGIN
                UPDATE `statistics_cache` SET
                    stat_value = (SELECT CAST(COUNT(*) AS CHAR) FROM `orders` WHERE status IN ('done', 'picked_up')),
                    last_calculated_at = NOW()
                WHERE stat_key = 'total_orders_completed';

                UPDATE `statistics_cache` SET
                    stat_value = (SELECT CAST(COUNT(*) AS CHAR) FROM `customers` WHERE is_active = 1),
                    last_calculated_at = NOW()
                WHERE stat_key = 'total_customers';

                UPDATE `statistics_cache` SET
                    stat_value = (SELECT CAST(COUNT(*) AS CHAR) FROM `service_categories` WHERE is_active = 1),
                    last_calculated_at = NOW()
                WHERE stat_key = 'total_service_categories';
            END
        ");
    }

    public function down(): void
    {
        DB::statement('DROP PROCEDURE IF EXISTS sp_generate_order_number');
        DB::statement('DROP PROCEDURE IF EXISTS sp_generate_tracking_token');
        DB::statement('DROP PROCEDURE IF EXISTS sp_update_statistics_cache');
        DB::statement('DROP VIEW IF EXISTS v_operating_hours');
        DB::statement('DROP VIEW IF EXISTS v_testimonials_active');
        DB::statement('DROP VIEW IF EXISTS v_faq_active');
        DB::statement('DROP VIEW IF EXISTS v_live_statistics');
        DB::statement('DROP VIEW IF EXISTS v_order_tracking');
        DB::statement('DROP VIEW IF EXISTS v_category_price_range');
        DB::statement('DROP VIEW IF EXISTS v_product_list');
    }
};


