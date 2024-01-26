document.addEventListener('DOMContentLoaded', function () {
    const dropdownButtons = document.querySelectorAll('.dropdown-btn');
    const dropdownContents = document.querySelectorAll('.dropdown-content');
    const mobileNavBtn = document.querySelector('.mobile-nav-btn');
    const mobileNavSidebar = document.querySelector('.mobile-nav-sidebar');

    dropdownButtons.forEach(function (button, index) {
        button.addEventListener('mouseover', function () {
            hideAllDropdowns();
            positionDropdown(dropdownContents[index], button);
            dropdownContents[index].style.display = 'block';
        });

        button.addEventListener('mouseout', function () {
            dropdownContents[index].style.display = 'none';
        });

        dropdownContents[index].addEventListener('mouseover', function () {
            dropdownContents[index].style.display = 'block';
        });

        dropdownContents[index].addEventListener('mouseout', function () {
            dropdownContents[index].style.display = 'none';
        });
    });

    mobileNavBtn.addEventListener('click', function () {
        toggleMobileNav();
    });

    function hideAllDropdowns() {
        dropdownContents.forEach(function (content) {
            content.style.display = 'none';
        });
    }

    function positionDropdown(dropdownContent, button) {
        const buttonRect = button.getBoundingClientRect();
        dropdownContent.style.position = 'absolute';
        dropdownContent.style.top = `${buttonRect.bottom}px`;
        dropdownContent.style.left = `${buttonRect.left}px`;
    }

    function toggleMobileNav() {
        var isSidebarVisible = (mobileNavSidebar.style.display === 'flex');

        if (isSidebarVisible) {
            mobileNavSidebar.style.display = 'none';
        } else {
            mobileNavSidebar.style.display = 'flex';
        }
    }

    function toggleMobileOptions(optionsId) {
        const mobileOptions = document.getElementById(optionsId);

        if (mobileOptions.style.display === 'block') {
            mobileOptions.style.display = 'none';
        } else {
            mobileOptions.style.display = 'block';
        }
    }

    const mobileBookingBtn = document.getElementById('mobile-booking-btn');
    mobileBookingBtn.addEventListener('click', function () {
        toggleMobileOptions('mobile-booking-options');
    });

    const mobileTripsBtn = document.getElementById('mobile-trips-btn');
    mobileTripsBtn.addEventListener('click', function () {
        toggleMobileOptions('mobile-trips-options');
    });

    // Add event listeners for the rest of the mobile buttons
    const mobileTravelInfoBtn = document.getElementById('mobile-travel-info-btn');
    mobileTravelInfoBtn.addEventListener('click', function () {
        toggleMobileOptions('mobile-travel-info-options');
    });

    const mobileDealsBtn = document.getElementById('mobile-deals-btn');
    mobileDealsBtn.addEventListener('click', function () {
        toggleMobileOptions('mobile-deals-options');
    });

    const mobileHelpBtn = document.getElementById('mobile-help-btn');
    mobileHelpBtn.addEventListener('click', function () {
        toggleMobileOptions('mobile-help-options');
    });
});
