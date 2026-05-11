(() => {
  console.log('Main JavaScript loaded');
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

window.editFaq = function (faqId, question, answer) {
  console.log('editFaq called with:', faqId, question, answer);
  const form = document.getElementById('faq-form');
  if (!form) {
    console.error('FAQ form not found');
    return;
  }
  form.action = `/admin/faqs/${faqId}`;
  let methodInput = form.querySelector('input[name="_method"]');
  if (!methodInput) {
    methodInput = document.createElement('input');
    methodInput.type = 'hidden';
    methodInput.name = '_method';
    form.appendChild(methodInput);
  }
  methodInput.value = 'PUT';

  const questionInput = form.querySelector('[name="question"]');
  const answerInput = form.querySelector('[name="answer"]');
  if (questionInput) questionInput.value = question;
  if (answerInput) answerInput.value = answer;

  const submitButton = document.getElementById('faq-submit-button');
  if (submitButton) submitButton.textContent = 'Perbarui FAQ';

  let cancelButton = form.querySelector('.cancel-edit-faq');
  if (!cancelButton) {
    cancelButton = document.createElement('button');
    cancelButton.type = 'button';
    cancelButton.className = 'btn btn-ghost cancel-edit-faq';
    cancelButton.textContent = 'Batal';
    cancelButton.addEventListener('click', cancelEditFaq);
    const actions = document.getElementById('faq-form-actions');
    if (actions) actions.appendChild(cancelButton);
  }

  window.location.hash = 'faq';
};

window.cancelEditFaq = function () {
  const form = document.getElementById('faq-form');
  if (!form) return;
  form.action = '/admin/faqs';
  const methodInput = form.querySelector('input[name="_method"]');
  if (methodInput) methodInput.remove();
  const questionInput = form.querySelector('[name="question"]');
  const answerInput = form.querySelector('[name="answer"]');
  if (questionInput) questionInput.value = '';
  if (answerInput) answerInput.value = '';
  const submitButton = document.getElementById('faq-submit-button');
  if (submitButton) submitButton.textContent = 'Simpan FAQ';
  const cancelButton = form.querySelector('.cancel-edit-faq');
  if (cancelButton) cancelButton.remove();
};

window.editTestimonial = function (testimonialId, customerName, content) {
  console.log('editTestimonial called with:', testimonialId, customerName, content);
  const form = document.getElementById('testimonial-form');
  if (!form) {
    console.error('Testimonial form not found');
    return;
  }
  form.action = `/admin/testimonials/${testimonialId}`;
  let methodInput = form.querySelector('input[name="_method"]');
  if (!methodInput) {
    methodInput = document.createElement('input');
    methodInput.type = 'hidden';
    methodInput.name = '_method';
    form.appendChild(methodInput);
  }
  methodInput.value = 'PUT';

  const nameInput = form.querySelector('[name="customer_name"]');
  const contentInput = form.querySelector('[name="content"]');
  if (nameInput) nameInput.value = customerName;
  if (contentInput) contentInput.value = content;

  const submitButton = document.getElementById('testimonial-submit-button');
  if (submitButton) submitButton.textContent = 'Perbarui testimoni';

  let cancelButton = form.querySelector('.cancel-edit-testimonial');
  if (!cancelButton) {
    cancelButton = document.createElement('button');
    cancelButton.type = 'button';
    cancelButton.className = 'btn btn-ghost cancel-edit-testimonial';
    cancelButton.textContent = 'Batal';
    cancelButton.addEventListener('click', cancelEditTestimonial);
    const actions = document.getElementById('testimonial-form-actions');
    if (actions) actions.appendChild(cancelButton);
  }

  window.location.hash = 'testimonials';
};

window.cancelEditTestimonial = function () {
  const form = document.getElementById('testimonial-form');
  if (!form) return;
  form.action = '/admin/testimonials';
  const methodInput = form.querySelector('input[name="_method"]');
  if (methodInput) methodInput.remove();
  const nameInput = form.querySelector('[name="customer_name"]');
  const contentInput = form.querySelector('[name="content"]');
  if (nameInput) nameInput.value = '';
  if (contentInput) contentInput.value = '';
  const submitButton = document.getElementById('testimonial-submit-button');
  if (submitButton) submitButton.textContent = 'Simpan testimoni';
  const cancelButton = form.querySelector('.cancel-edit-testimonial');
  if (cancelButton) cancelButton.remove();
};

window.editOperatingHour = function (hourId, day, openTime, closeTime, isClosed) {
  console.log('editOperatingHour called with:', hourId, day, openTime, closeTime, isClosed);
  const form = document.getElementById('operating-hour-form');
  if (!form) {
    console.error('Operating hour form not found');
    return;
  }
  form.action = `/admin/operating-hours/${hourId}`;
  console.log('Form action changed to:', form.action);
  let methodInput = form.querySelector('input[name="_method"]');
  if (!methodInput) {
    methodInput = document.createElement('input');
    methodInput.type = 'hidden';
    methodInput.name = '_method';
    form.appendChild(methodInput);
  }
  methodInput.value = 'PUT';
  console.log('Method input set to PUT');

  const openInput = form.querySelector('[name="open_time"]');
  const closeInput = form.querySelector('[name="closed_time"]');
  const closedSelect = form.querySelector('[name="is_closed"]');
  if (openInput) {
    openInput.value = openTime;
    console.log('Open time set to:', openTime);
  }
  if (closeInput) {
    closeInput.value = closeTime;
    console.log('Close time set to:', closeTime);
  }
  if (closedSelect) {
    closedSelect.value = isClosed ? '1' : '0';
    console.log('Is closed set to:', isClosed ? '1' : '0');
  }

  const submitButton = document.getElementById('operating-hour-submit-button');
  if (submitButton) submitButton.textContent = 'Perbarui jam operasional';

  let cancelButton = form.querySelector('.cancel-edit-operating-hour');
  if (!cancelButton) {
    cancelButton = document.createElement('button');
    cancelButton.type = 'button';
    cancelButton.className = 'btn btn-ghost cancel-edit-operating-hour';
    cancelButton.textContent = 'Batal';
    cancelButton.addEventListener('click', cancelEditOperatingHour);
    const actions = document.getElementById('operating-hour-form-actions');
    if (actions) actions.appendChild(cancelButton);
  }

  window.location.hash = 'hours';
};

window.cancelEditOperatingHour = function () {
  const form = document.getElementById('operating-hour-form');
  if (!form) return;
  form.action = '/admin/operating-hours';
  const methodInput = form.querySelector('input[name="_method"]');
  if (methodInput) methodInput.remove();
  const openInput = form.querySelector('[name="open_time"]');
  const closeInput = form.querySelector('[name="closed_time"]');
  const closedSelect = form.querySelector('[name="is_closed"]');
  if (openInput) openInput.value = '';
  if (closeInput) closeInput.value = '';
  if (closedSelect) closedSelect.value = '';
  const submitButton = document.getElementById('operating-hour-submit-button');
  if (submitButton) submitButton.textContent = 'Simpan jam operasional';
  const cancelButton = form.querySelector('.cancel-edit-operating-hour');
  if (cancelButton) cancelButton.remove();
};

const initAdminEditButtons = () => {
  console.log('initAdminEditButtons called');
  // Use event delegation for better reliability
  document.addEventListener('click', (event) => {
    console.log('Click detected on:', event.target.className, event.target.tagName);
    if (event.target.classList.contains('edit-faq-button')) {
      event.preventDefault();
      const button = event.target;
      const faqId = button.dataset.id;
      const question = button.dataset.question || '';
      const answer = button.dataset.answer || '';
      console.log('Edit FAQ clicked:', faqId, question, answer);
      window.editFaq(faqId, question, answer);
    } else if (event.target.classList.contains('edit-testimonial-button')) {
      event.preventDefault();
      const button = event.target;
      const testimonialId = button.dataset.id;
      const customerName = button.dataset.name || '';
      const content = button.dataset.content || '';
      console.log('Edit Testimonial clicked:', testimonialId, customerName, content);
      window.editTestimonial(testimonialId, customerName, content);
    } else if (event.target.classList.contains('edit-operating-hour-button')) {
      event.preventDefault();
      console.log('Operating hour edit button clicked');
      const button = event.target;
      const hourId = button.dataset.id;
      const openTime = button.dataset.open || '';
      const closeTime = button.dataset.close || '';
      const isClosed = button.dataset.closed === '1';
      console.log('Edit Operating Hour clicked:', hourId, openTime, closeTime, isClosed);
      window.editOperatingHour(hourId, '', openTime, closeTime, isClosed);
    }
  });
};

// Check for fragment on page load and scroll to section
document.addEventListener('DOMContentLoaded', function() {
  if (window.location.hash) {
    const element = document.querySelector(window.location.hash);
    if (element) {
      element.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
  }
  initAdminEditButtons();
});
