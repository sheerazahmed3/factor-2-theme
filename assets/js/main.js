(() => {
  const toggle = document.querySelector(".nav-toggle");
  const navigation = document.querySelector(".site-navigation");

  if (!toggle || !navigation) {
    return;
  }

  const closeMenu = () => {
    toggle.setAttribute("aria-expanded", "false");
    navigation.classList.remove("is-open");
    document.body.classList.remove("nav-is-open");
  };

  toggle.addEventListener("click", () => {
    const isExpanded = "true" === toggle.getAttribute("aria-expanded");
    toggle.setAttribute("aria-expanded", isExpanded ? "false" : "true");
    navigation.classList.toggle("is-open", !isExpanded);
    document.body.classList.toggle("nav-is-open", !isExpanded);
  });

  navigation.querySelectorAll("a").forEach((link) => {
    link.addEventListener("click", (e) => {
      const parent = link.parentElement;
      const hasChildren = parent.classList.contains("menu-item-has-children");

      if (hasChildren && (window.innerWidth <= 991 || link.getAttribute("href") === "#" || link.getAttribute("href") === "")) {
        e.preventDefault();
        parent.classList.toggle("is-open");
      } else if (window.innerWidth <= 991) {
        closeMenu();
      }
    });
  });

  window.addEventListener("resize", () => {
    if (window.innerWidth > 991) {
      closeMenu();
    }
  });

  // Intersection Observer for scroll animations
  const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
  };

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('is-visible');
        observer.unobserve(entry.target);
      }
    });
  }, observerOptions);

  document.querySelectorAll('.animate-on-scroll').forEach(el => {
    observer.observe(el);
  });

})();
