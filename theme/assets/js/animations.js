(function () {
  "use strict";

  // Wait for DOM to be ready
  document.addEventListener("DOMContentLoaded", function () {
    // Check if GSAP is loaded
    if (typeof gsap === "undefined") {
      console.error("GSAP not loaded");
      return;
    }

    // Register ScrollTrigger plugin
    gsap.registerPlugin(ScrollTrigger);

    // Get settings from WordPress
    const settings = window.animationSettings || {};

    // Initialize Smooth Scroll
    if (settings.smoothScroll && typeof ScrollSmoother !== "undefined") {
      // Wrap content for smooth scroll
      const body = document.body;
      const wrapper = document.createElement("div");
      wrapper.id = "smooth-wrapper";

      const content = document.createElement("div");
      content.id = "smooth-content";

      // Move all body content into the wrapper
      while (body.firstChild) {
        content.appendChild(body.firstChild);
      }

      wrapper.appendChild(content);
      body.appendChild(wrapper);

      // Initialize ScrollSmoother
      ScrollSmoother.create({
        wrapper: "#smooth-wrapper",
        content: "#smooth-content",
        smooth: settings.smoothScrollSpeed || 1,
        effects: true,
        smoothTouch: 0.1,
      });
    }

    // Initialize Fade In Animations
    if (settings.fadeIn) {
      const duration = settings.fadeInDuration || 1;
      const distance = settings.fadeInDistance || 50;

      // Add animation class to elements
      const animateElements = document.querySelectorAll(
        "section, .hero, .cta, .team, .testimonials, .faq, .advantages, .content-block"
      );

      animateElements.forEach((element, index) => {
        // Set initial state
        gsap.set(element, {
          opacity: 0,
          y: distance,
        });

        // Animate on scroll
        gsap.to(element, {
          opacity: 1,
          y: 0,
          duration: duration,
          ease: "power2.out",
          scrollTrigger: {
            trigger: element,
            start: "top 80%",
            end: "top 50%",
            toggleActions: "play none none none",
            once: true, // Only animate once
          },
        });
      });

      // Fade in individual cards/items with stagger
      const cardElements = document.querySelectorAll(
        ".team-member, .testimonial-card, .advantage-item, .faq-item, .content-card"
      );

      if (cardElements.length > 0) {
        gsap.set(cardElements, {
          opacity: 0,
          y: distance / 2,
        });

        ScrollTrigger.batch(cardElements, {
          onEnter: (batch) =>
            gsap.to(batch, {
              opacity: 1,
              y: 0,
              duration: duration * 0.8,
              stagger: 0.15,
              ease: "power2.out",
            }),
          start: "top 85%",
          once: true,
        });
      }
    }

    // Refresh ScrollTrigger after everything is set up
    setTimeout(() => {
      ScrollTrigger.refresh();
    }, 100);
  });
})();
