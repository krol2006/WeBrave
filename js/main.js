window.onload = function() { 
    function setCookie(name, value, days) {
        var date = new Date;
        date.setTime(date.getTime() + 24 * 60 * 60 * 1000 * days);
        document.cookie = name + "=" + value + ";path=/;expires=" + date.toGMTString();
    }
    const btns = document.querySelectorAll('[data-lang]');

    btns.forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            const cookie_name = 'language';
            const lang_key = e.target.getAttribute('data-lang');
            setCookie(cookie_name, lang_key, 1);
            location.reload(); 
        });
    });
}