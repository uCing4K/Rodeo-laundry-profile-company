(() => {
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


  const trackingForm = document.querySelector("[data-tracking-form]");
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
