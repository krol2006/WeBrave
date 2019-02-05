window.onload = function() {
    function setCookie(name, value, days) {
        const date = new Date;
        date.setTime(date.getTime() + 24 * 60 * 60 * 1000 * days);
        document.cookie = name + "=" + value + ";path=/;expires=" + date.toGMTString();
    }

    const btns = document.querySelectorAll('[data-lang]');
    const menuLayout = document.querySelector('.sidebar__layout');
    const gallery = document.querySelector('.gallery');
    const sidebar = document.querySelector('.sidebar');
    const sidebarToggle = document.querySelector('.sidebar__toggle');
    const form = document.querySelector('.form');
    const folioMore = document.querySelector('.folio__more__button');

    btns.forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            const cookie_name = 'language';
            const lang_key = e.target.getAttribute('data-lang');
            setCookie(cookie_name, lang_key, 1);
            location.reload(); 
        });
    });

    window.addEventListener('scroll', function() {
        if (window.scrollY > 157) {
            menuLayout.classList.add("sidebar__layout--fixed");
        } else {
            menuLayout.classList.remove("sidebar__layout--fixed");
        }
    });

    sidebarToggle.addEventListener('click', function() {
        const $this = this;

        if ($this.classList) {
            document.querySelector('body').classList.toggle('overflow');
            sidebar.classList.toggle("sidebar--opened");
            $this.classList.toggle("sidebar__toggle--active");
        } else {
            const classes = $this.className.split(' ');
            const existingIndex = classes.indexOf("sidebar__toggle--active");
          
            if (existingIndex >= 0) {
              classes.splice(existingIndex, 1);
            } else {
              classes.push("sidebar__toggle--active");
            }
          
            $this.className = classes.join(' ');
        }
    });

    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();

            const $this = this;
            const formData = new FormData($this);

            if (!formData.get('name') || formData.get('name') === '') {
                $this.querySelector('[name="name"]').classList.add('error');
                return;
            }

            if (!formData.get('phone') || formData.get('phone') === '' || !formData.get('phone').match(/\d/g)) {
                $this.querySelector('[name="phone"]').classList.add('error');
                return;
            }

            const xhr = new XMLHttpRequest();
            xhr.open("POST", 'views/form.php', true);
            xhr.onreadystatechange = function() {
                if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                    form.innerHTML = this.responseText;
                }
            }
            xhr.send(formData);
        });
    }

    if(gallery) {
        initPhotoSwipeFromDOM('.gallery');
    }
}