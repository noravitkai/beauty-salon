// header.php
const parentLink = document.querySelector(".no-click a");

parentLink.addEventListener("click", (event) => {
  event.preventDefault();
});

const mobileMenuButton = document.getElementById("mobile-menu-button");
const mobileMenu = document.getElementById("mobile-menu");
const menuIcon = document.getElementById("menu-icon");
const closeIcon = document.getElementById("close-icon");

mobileMenuButton.addEventListener("click", () => {
  mobileMenu.classList.toggle("hidden");
  menuIcon.classList.toggle("hidden");
  closeIcon.classList.toggle("hidden");
});

// cosmetics.php, hairdressing.php, nails.php, natural-medicine.php
document.addEventListener("DOMContentLoaded", function () {
  // Function to show/hide tabs based on the selected tab within a card
  function showTab(card, tabId) {
    // Hide all tabs within the card
    const cardTabs = card.querySelectorAll('[role="tabpanel"]');
    cardTabs.forEach((tab) => {
      tab.classList.add("hidden");
      tab.setAttribute("aria-selected", "false");
    });

    // Show the selected tab within the card
    const selectedTab = card.querySelector(`[id="${tabId}"]`);
    if (selectedTab) {
      selectedTab.classList.remove("hidden");
      selectedTab.setAttribute("aria-selected", "true");
    }
  }

  // Show the "treatment" tab content by default for each subservice within each card
  const cardContents = document.querySelectorAll('[id$="Content"]');
  cardContents.forEach((card) => {
    const defaultTab = card.querySelector('[id$="-treatment"]');
    if (defaultTab) {
      defaultTab.classList.remove("hidden");
    }
  });

  // Set up click event listeners to each tab button within each card
  const cardButtons = document.querySelectorAll('[role="tab"]');
  cardButtons.forEach((button) => {
    button.addEventListener("click", function () {
      // Get the closest card element based on the clicked button
      const card = this.closest(".mt-16");

      // Get the target tab ID from the button's data attribute
      const tabId = this.getAttribute("data-tabs-target");

      // Show the selected tab within the card
      showTab(card, tabId);
    });
  });
});

// footer.php
document.addEventListener("DOMContentLoaded", function () {
  var scrollToTopButton = document.getElementById("scroll-to-top-btn");

  // Show or hide the button based on scroll position
  window.addEventListener("scroll", function () {
    if (window.scrollY > 200) {
      scrollToTopButton.classList.remove("hidden");
    } else {
      scrollToTopButton.classList.add("hidden");
    }
  });

  // Scroll to top when the button is clicked
  scrollToTopButton.addEventListener("click", function () {
    window.scrollTo({
      top: 0,
      behavior: "smooth",
    });
  });
});
