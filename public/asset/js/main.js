(() => {
  // ========== MOBILE MENU HANDLER ==========
  const menuToggle = document.querySelector("[data-menu-toggle]");
  const menuPanel = document.querySelector("[data-menu-panel]");
  const root = document.documentElement;

  if (menuToggle && menuPanel) {
    menuToggle.addEventListener("click", () => {
      const isOpen = menuPanel.classList.toggle("is-open");
      document.body.classList.toggle("menu-open", isOpen);
      root.classList.toggle("menu-open", isOpen);
      menuToggle.setAttribute("aria-expanded", String(isOpen));
    });

    menuPanel.querySelectorAll("a").forEach((link) => {
      link.addEventListener("click", () => {
        menuPanel.classList.remove("is-open");
        document.body.classList.remove("menu-open");
        root.classList.remove("menu-open");
        menuToggle.setAttribute("aria-expanded", "false");
      });
    });
  }

  // ========== ADMIN MENU HANDLER ==========
  const adminMenuToggle = document.querySelector("[data-admin-menu-toggle]");
  const adminMenuClose = document.querySelector("[data-admin-menu-close]");
  const adminSidebar = document.querySelector("[data-admin-sidebar]");
  const adminBackdrop = document.querySelector("[data-admin-backdrop]");

  const setAdminMenuState = (isOpen) => {
    document.body.classList.toggle("admin-menu-open", isOpen);
    if (adminMenuToggle) {
      adminMenuToggle.setAttribute("aria-expanded", String(isOpen));
    }
  };

  if (adminMenuToggle && adminSidebar) {
    adminMenuToggle.addEventListener("click", () => {
      const isOpen = !document.body.classList.contains("admin-menu-open");
      setAdminMenuState(isOpen);
    });

    if (adminMenuClose) {
      adminMenuClose.addEventListener("click", () => {
        setAdminMenuState(false);
      });
    }

    if (adminBackdrop) {
      adminBackdrop.addEventListener("click", () => {
        setAdminMenuState(false);
      });
    }

    adminSidebar.querySelectorAll("a").forEach((link) => {
      link.addEventListener("click", () => {
        if (window.innerWidth <= 960) {
          setAdminMenuState(false);
        }
      });
    });

    window.addEventListener("resize", () => {
      if (window.innerWidth > 960) {
        setAdminMenuState(false);
      }
    });
  }

  // ========== ADMIN NAVIGATION ITEMS HANDLER ==========
  const adminNavItems = document.querySelectorAll(".admin-nav-item");
  if (adminNavItems.length) {
    const setActiveNav = (hash) => {
      let matched = false;
      adminNavItems.forEach((item) => {
        const isMatch = hash && item.getAttribute("href") === hash;
        if (isMatch) {
          matched = true;
        }
        item.classList.toggle("is-active", isMatch);
      });

      if (!matched) {
        adminNavItems.forEach((item, index) => {
          item.classList.toggle("is-active", index === 0);
        });
      }
    };

    adminNavItems.forEach((item) => {
      item.addEventListener("click", () => {
        setActiveNav(item.getAttribute("href"));
      });
    });

    setActiveNav(window.location.hash);
    window.addEventListener("hashchange", () => {
      setActiveNav(window.location.hash);
    });
  }

  // ========== REVEAL ITEMS HANDLER (INTERSECTION OBSERVER) ==========
  const revealItems = document.querySelectorAll("[data-reveal]");
  if (revealItems.length) {
    const observer = new IntersectionObserver(
      (entries, observerInstance) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.classList.add("is-visible");
            observerInstance.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.2 }
    );

    revealItems.forEach((item) => observer.observe(item));
  }

  // ========== ACCORDION HANDLER ==========
  const accordions = document.querySelectorAll("[data-accordion]");
  if (accordions.length) {
    accordions.forEach((item) => {
      const button = item.querySelector("button");
      if (!button) {
        return;
      }

      button.addEventListener("click", () => {
        const isOpen = item.classList.toggle("is-open");
        button.setAttribute("aria-expanded", String(isOpen));
      });
    });
  }

  // ========== CONFIRM FORMS HANDLER ==========
  const confirmForms = document.querySelectorAll("form[data-confirm]");
  if (confirmForms.length) {
    confirmForms.forEach((form) => {
      form.addEventListener("submit", (event) => {
        event.preventDefault();
        const message = form.getAttribute("data-confirm") || "Lanjutkan aksi ini?";
        if (typeof window.confirmDelete === 'function') {
          window.confirmDelete(message, form);
        } else {
          if (window.confirm(message)) {
            form.submit();
          }
        }
      });
    });
  }

  // ========== TRACKING FORM HANDLER ==========  const trackingForm = document.querySelector("[data-tracking-form]");
  if (trackingForm) {
    const input = trackingForm.querySelector("input");
    const redirectBase = trackingForm.getAttribute("data-tracking-redirect");
    const resultWrap = document.querySelector("[data-tracking-result]");
    const resultCard = document.querySelector("[data-tracking-card]");
    const orderOutput = document.querySelector("[data-tracking-order]");
    const errorOutput = document.querySelector("[data-tracking-error]");

    trackingForm.addEventListener("submit", (event) => {
      event.preventDefault();
      const value = input ? input.value.trim() : "";

      if (!value) {
        if (errorOutput) {
          errorOutput.textContent = "Masukkan token tracking terlebih dahulu.";
          errorOutput.hidden = false;
        }
        if (input) {
          input.focus();
        }
        return;
      }

      if (errorOutput) {
        errorOutput.textContent = "";
        errorOutput.hidden = true;
      }

      if (redirectBase) {
        const targetUrl = `${redirectBase}?token=${encodeURIComponent(value)}`;
        const popup = window.open(targetUrl, "_blank");
        if (!popup) {
          window.location.href = targetUrl;
        }
        return;
      }

      if (resultWrap) {
        resultWrap.classList.add("has-result");
      }

      if (resultCard) {
        resultCard.classList.add("is-visible");
      }

      if (orderOutput) {
        orderOutput.textContent = value;
      }
    });
  }
})();

// ========== WINDOW UTILITIES (MODALS & CONFIRMATIONS) ==========
window.confirmLogout = function() {
  const modal = document.getElementById('logout-modal');
  if (modal) modal.style.display = 'flex';
};

let currentDeleteForm = null;
window.confirmDelete = function(message, form) {
  const textEl = document.getElementById('delete-modal-text');
  const modalEl = document.getElementById('delete-modal');
  if (textEl && modalEl) {
    textEl.innerText = message;
    currentDeleteForm = form;
    modalEl.style.display = 'flex';
  }
};

window.submitDeleteForm = function() {
  if (currentDeleteForm) {
    currentDeleteForm.submit();
  }
};

// ========== SERVICE CATEGORY EDIT FUNCTIONS ==========
window.editServiceCategory = function(id, category, product, unit, price, type_id, description) {
  const form = document.getElementById('form-service-categories');
  if (!form) return;
  form.action = `/admin/service-categories/${id}`;

  let methodInput = form.querySelector('input[name="_method"]');
  if (!methodInput) {
      methodInput = document.createElement('input');
      methodInput.type = 'hidden';
      methodInput.name = '_method';
      form.appendChild(methodInput);
  }
  methodInput.value = 'PUT';

  const catInput = form.querySelector('input[name="category"]');
  if (catInput) catInput.value = category || '';

  const prodInput = form.querySelector('input[name="product"]');
  if (prodInput) prodInput.value = product || '';

  const unitSelect = form.querySelector('select[name="unit"]');
  if (unitSelect) {
    let normalizedUnit = unit ? unit.toLowerCase().trim() : '';
    if (normalizedUnit && !normalizedUnit.startsWith('/')) {
        normalizedUnit = '/' + normalizedUnit;
    }
    unitSelect.value = normalizedUnit || '';
  }

  const priceInput = form.querySelector('input[name="base_price"]');
  if (priceInput) priceInput.value = price || '0';

  const typeSelect = form.querySelector('select[name="service_type_id"]');
  if (typeSelect) typeSelect.value = type_id || '';

  const descInput = form.querySelector('textarea[name="description"]');
  if (descInput) descInput.value = description || '';

  const submitBtn = form.querySelector('button[type="submit"]');
  if (submitBtn) submitBtn.innerText = 'Update layanan';

  const cancelBtn = document.getElementById('cancel-edit-service-categories');
  if (cancelBtn) cancelBtn.style.display = 'inline-flex';

  form.scrollIntoView({ behavior: 'smooth', block: 'center' });
};

window.cancelEditServiceCategory = function() {
  const form = document.getElementById('form-service-categories');
  if (!form) return;
  form.reset();
  form.action = "/admin/service-categories";

  let methodInput = form.querySelector('input[name="_method"]');
  if (methodInput) {
      methodInput.remove();
  }

  const submitBtn = form.querySelector('button[type="submit"]');
  if (submitBtn) submitBtn.innerText = 'Simpan layanan';

  const cancelBtn = document.getElementById('cancel-edit-service-categories');
  if (cancelBtn) cancelBtn.style.display = 'none';
};

// ========== SERVICE TYPE EDIT FUNCTIONS ==========
window.editServiceType = function(id, name, duration, cost, description) {
  const form = document.getElementById('form-service-types');
  if (!form) return;
  form.action = `/admin/service-types/${id}`;

  let methodInput = form.querySelector('input[name="_method"]');
  if (!methodInput) {
      methodInput = document.createElement('input');
      methodInput.type = 'hidden';
      methodInput.name = '_method';
      form.appendChild(methodInput);
  }
  methodInput.value = 'PUT';

  const nameInput = form.querySelector('input[name="name"]');
  if (nameInput) nameInput.value = name || '';

  const durationInput = form.querySelector('input[name="estimated_duration"]');
  if (durationInput) durationInput.value = duration || '';

  const costInput = form.querySelector('input[name="additional_cost"]');
  if (costInput) costInput.value = cost || '0';

  const descInput = form.querySelector('textarea[name="description"]');
  if (descInput) descInput.value = description || '';

  const submitBtn = form.querySelector('button[type="submit"]');
  if (submitBtn) submitBtn.innerText = 'Update tipe';

  const cancelBtn = document.getElementById('cancel-edit-service-types');
  if (cancelBtn) cancelBtn.style.display = 'inline-flex';

  form.scrollIntoView({ behavior: 'smooth', block: 'center' });
};

window.cancelEditServiceType = function() {
  const form = document.getElementById('form-service-types');
  if (!form) return;
  form.reset();
  form.action = "/admin/service-types";

  let methodInput = form.querySelector('input[name="_method"]');
  if (methodInput) {
      methodInput.remove();
  }

  const submitBtn = form.querySelector('button[type="submit"]');
  if (submitBtn) submitBtn.innerText = 'Simpan tipe';

  const cancelBtn = document.getElementById('cancel-edit-service-types');
  if (cancelBtn) cancelBtn.style.display = 'none';
};

// ========== COMPANY SETTINGS EDIT FUNCTIONS ==========
window.editCompanySettings = function() {
  const form = document.getElementById('form-company-settings');
  if (!form) return;

  const inputs = form.querySelectorAll('input, textarea');
  inputs.forEach(input => {
    input.removeAttribute('disabled');
  });

  const btnEdit = document.getElementById('btn-edit-settings');
  const btnSave = document.getElementById('btn-save-settings');
  const btnCancel = document.getElementById('btn-cancel-settings');

  if (btnEdit) btnEdit.style.display = 'none';
  if (btnSave) btnSave.style.display = 'inline-flex';
  if (btnCancel) btnCancel.style.display = 'inline-flex';
};

window.cancelEditCompanySettings = function() {
  const form = document.getElementById('form-company-settings');
  if (!form) return;

  form.reset();

  const inputs = form.querySelectorAll('input, textarea');
  inputs.forEach(input => {
    input.setAttribute('disabled', 'disabled');
  });

  const btnEdit = document.getElementById('btn-edit-settings');
  const btnSave = document.getElementById('btn-save-settings');
  const btnCancel = document.getElementById('btn-cancel-settings');

  if (btnEdit) btnEdit.style.display = 'inline-flex';
  if (btnSave) btnSave.style.display = 'none';
  if (btnCancel) btnCancel.style.display = 'none';
};

// ========== SEARCH FILTER HANDLER ==========
window.filterPopularSearch = function(query) {
  const container = document.getElementById('popular-search-results');
  if (!container) return;

  const items = container.querySelectorAll('[data-search]');
  const q = query.toLowerCase().trim();

  items.forEach(item => {
    const searchVal = item.getAttribute('data-search') || '';
    item.style.display = searchVal.includes(q) ? 'flex' : 'none';
  });
};

// ========== FAQ EDIT FUNCTIONS ==========
window.editFaq = function(id, question, answer) {
  const form = document.getElementById("faq-form");
  if (!form) return;
  form.action = `/admin/faqs/${id}`;

  let methodInput = form.querySelector(`input[name="_method"]`);
  if (!methodInput) {
      methodInput = document.createElement("input");
      methodInput.type = "hidden";
      methodInput.name = "_method";
      form.appendChild(methodInput);
  }
  methodInput.value = "PUT";

  const qInput = form.querySelector(`input[name="question"]`);
  if (qInput) qInput.value = question || "";

  const aInput = form.querySelector(`textarea[name="answer"]`);
  if (aInput) aInput.value = answer || "";

  const submitBtn = document.getElementById("faq-submit-button");
  if (submitBtn) submitBtn.innerText = "Update FAQ";

  const cancelBtn = document.getElementById("cancel-edit-faq");
  if (cancelBtn) cancelBtn.style.display = "inline-flex";

  form.scrollIntoView({ behavior: "smooth", block: "center" });
};

window.cancelEditFaq = function() {
  const form = document.getElementById("faq-form");
  if (!form) return;
  form.reset();
  form.action = "/admin/faqs";

  let methodInput = form.querySelector(`input[name="_method"]`);
  if (methodInput) {
      methodInput.remove();
  }

  const submitBtn = document.getElementById("faq-submit-button");
  if (submitBtn) submitBtn.innerText = "Simpan FAQ";

  const cancelBtn = document.getElementById("cancel-edit-faq");
  if (cancelBtn) cancelBtn.style.display = "none";
};

// ========== TESTIMONIAL EDIT FUNCTIONS ==========
window.editTestimonial = function(id, name, content) {
  const form = document.getElementById("testimonial-form");
  if (!form) return;
  form.action = `/admin/testimonials/${id}`;

  let methodInput = form.querySelector(`input[name="_method"]`);
  if (!methodInput) {
      methodInput = document.createElement("input");
      methodInput.type = "hidden";
      methodInput.name = "_method";
      form.appendChild(methodInput);
  }
  methodInput.value = "PUT";

  const nInput = form.querySelector(`input[name="customer_name"]`);
  if (nInput) nInput.value = name || "";

  const cInput = form.querySelector(`textarea[name="content"]`);
  if (cInput) cInput.value = content || "";

  const submitBtn = document.getElementById("testimonial-submit-button");
  if (submitBtn) submitBtn.innerText = "Update testimoni";

  const cancelBtn = document.getElementById("cancel-edit-testimonial");
  if (cancelBtn) cancelBtn.style.display = "inline-flex";

  form.scrollIntoView({ behavior: "smooth", block: "center" });
};

window.cancelEditTestimonial = function() {
  const form = document.getElementById("testimonial-form");
  if (!form) return;
  form.reset();
  form.action = "/admin/testimonials";

  let methodInput = form.querySelector(`input[name="_method"]`);
  if (methodInput) {
      methodInput.remove();
  }

  const submitBtn = document.getElementById("testimonial-submit-button");
  if (submitBtn) submitBtn.innerText = "Simpan testimoni";

  const cancelBtn = document.getElementById("cancel-edit-testimonial");
  if (cancelBtn) cancelBtn.style.display = "none";
};

// ========== OPERATING HOURS EDIT FUNCTIONS ==========
window.editOperatingHour = function(id, open, close, is_closed) {
  const form = document.getElementById("operating-hour-form");
  if (!form) return;
  form.action = `/admin/operating-hours/${id}`;

  let methodInput = form.querySelector(`input[name="_method"]`);
  if (!methodInput) {
      methodInput = document.createElement("input");
      methodInput.type = "hidden";
      methodInput.name = "_method";
      form.appendChild(methodInput);
  }
  methodInput.value = "PUT";

  const oInput = form.querySelector(`input[name="open_time"]`);
  if (oInput) {
      if(open && open.length > 5) {
          oInput.value = open.substring(0, 5);
      } else {
          oInput.value = open || "";
      }
  }

  const cInput = form.querySelector(`input[name="closed_time"]`);
  if (cInput) {
      if(close && close.length > 5) {
          cInput.value = close.substring(0, 5);
      } else {
          cInput.value = close || "";
      }
  }

  const sInput = form.querySelector(`select[name="is_closed"]`);
  if (sInput) sInput.value = is_closed ? "1" : "0";

  const submitBtn = document.getElementById("operating-hour-submit-button");
  if (submitBtn) submitBtn.innerText = "Update jam operasional";

  const cancelBtn = document.getElementById("cancel-edit-operating-hour");
  if (cancelBtn) cancelBtn.style.display = "inline-flex";

  form.scrollIntoView({ behavior: "smooth", block: "center" });
};

window.cancelEditOperatingHour = function() {
  const form = document.getElementById("operating-hour-form");
  if (!form) return;
  form.reset();
  form.action = "/admin/operating-hours";

  let methodInput = form.querySelector(`input[name="_method"]`);
  if (methodInput) {
      methodInput.remove();
  }

  const submitBtn = document.getElementById("operating-hour-submit-button");
  if (submitBtn) submitBtn.innerText = "Simpan jam operasional";

  const cancelBtn = document.getElementById("cancel-edit-operating-hour");
  if (cancelBtn) cancelBtn.style.display = "none";
};

