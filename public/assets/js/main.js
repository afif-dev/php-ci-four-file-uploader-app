"use strict";

/* Aside: submenus toggle */
Array.from(document.getElementsByClassName("menu is-menu-main")).forEach(function (el) {
  Array.from(el.getElementsByClassName("has-dropdown-icon")).forEach(function (elA) {
    elA.addEventListener("click", function (e) {
      var dropdownIcon = e.currentTarget.getElementsByClassName("dropdown-icon")[0].getElementsByClassName("mdi")[0];
      e.currentTarget.parentNode.classList.toggle("is-active");
      dropdownIcon.classList.toggle("mdi-plus");
      dropdownIcon.classList.toggle("mdi-minus");
    });
  });
});
/* Aside Mobile toggle */

Array.from(document.getElementsByClassName("jb-aside-mobile-toggle")).forEach(function (el) {
  el.addEventListener("click", function (e) {
    var dropdownIcon = e.currentTarget.getElementsByClassName("icon")[0].getElementsByClassName("mdi")[0];
    document.documentElement.classList.toggle("has-aside-mobile-expanded");
    dropdownIcon.classList.toggle("mdi-forwardburger");
    dropdownIcon.classList.toggle("mdi-backburger");
  });
});
/* NavBar menu mobile toggle */

Array.from(document.getElementsByClassName("jb-navbar-menu-toggle")).forEach(function (el) {
  el.addEventListener("click", function (e) {
    var dropdownIcon = e.currentTarget.getElementsByClassName("icon")[0].getElementsByClassName("mdi")[0];
    document.getElementById(e.currentTarget.getAttribute("data-target")).classList.toggle("is-active");
    dropdownIcon.classList.toggle("mdi-dots-vertical");
    dropdownIcon.classList.toggle("mdi-close");
  });
});
/* Modal: open */

Array.from(document.getElementsByClassName("jb-modal")).forEach(function (el) {
  el.addEventListener("click", function (e) {
    var modalTarget = e.currentTarget.getAttribute("data-target");
    document.getElementById(modalTarget).classList.add("is-active");
    document.documentElement.classList.add("is-clipped");
  });
});
/* Modal: close */

Array.from(document.getElementsByClassName("jb-modal-close")).forEach(function (el) {
  el.addEventListener("click", function (e) {
    e.currentTarget.closest(".modal").classList.remove("is-active");
    document.documentElement.classList.remove("is-clipped");
  });
});

/* Notification dismiss */
Array.from(document.getElementsByClassName("jb-notification-dismiss")).forEach(function (el) {
  el.addEventListener("click", function (e) {
    e.currentTarget.closest(".notification").classList.add("is-hidden");
  });
});

document.addEventListener("DOMContentLoaded", () => {
  (document.querySelectorAll(".message .delete") || []).forEach(($delete) => {
    const $message = $delete.parentNode;
    $delete.addEventListener("click", () => {
      $message.parentNode.remove();
    });
  });
});

document.addEventListener("DOMContentLoaded", () => {
  // Functions to open and close a modal
  function openModal($el) {
    $el.classList.add("is-active");
  }

  function closeModal($el) {
    $el.classList.remove("is-active");
  }

  function closeAllModals() {
    (document.querySelectorAll(".modal") || []).forEach(($modal) => {
      closeModal($modal);
    });
  }

  // Add a click event on buttons to open a specific modal
  (document.querySelectorAll(".js-modal-trigger") || []).forEach(($trigger) => {
    const modal = $trigger.dataset.target;
    const $target = document.getElementById(modal);

    $trigger.addEventListener("click", () => {
      openModal($target);
    });
  });

  // Add a click event on various child elements to close the parent modal
  (document.querySelectorAll(".modal-background, .modal-close, .modal-card-head .delete, .modal-card-foot .button") || []).forEach(($close) => {
    const $target = $close.closest(".modal");

    $close.addEventListener("click", () => {
      closeModal($target);
    });
  });

  // Add a keyboard event to close all modals
  document.addEventListener("keydown", (event) => {
    const e = event || window.event;

    if (e.keyCode === 27) {
      // Escape key
      closeAllModals();
    }
  });
});
