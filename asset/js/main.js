(() => {
  const menuToggle = document.querySelector("[data-menu-toggle]");
  const menuPanel = document.querySelector("[data-menu-panel]");

  if (menuToggle && menuPanel) {
    menuToggle.addEventListener("click", () => {
      const isOpen = menuPanel.classList.toggle("is-open");
      document.body.classList.toggle("menu-open", isOpen);
      menuToggle.setAttribute("aria-expanded", String(isOpen));
    });

    menuPanel.querySelectorAll("a").forEach((link) => {
      link.addEventListener("click", () => {
        menuPanel.classList.remove("is-open");
        document.body.classList.remove("menu-open");
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
        const message = form.getAttribute("data-confirm") || "Lanjutkan aksi ini?";
        if (!window.confirm(message)) {
          event.preventDefault();
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
