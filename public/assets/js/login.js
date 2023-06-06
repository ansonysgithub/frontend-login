window.addEventListener("DOMContentLoaded", function () {
    console.log("login.js loaded");
    let form = document.getElementById("frontend-login-form");
    let message = document.getElementById("frontend-login-register-message");

    form.addEventListener("submit", function (e) {
        e.preventDefault();

        let data = new FormData(form);
        let parseData = new URLSearchParams(data);

        fetch(`${an_login_obj.rest_url}/login`,
            {
                method: "POST",
                body: parseData
            })
            .then(res => res.json())
            .then(json => {
                console.log(json);
                if (!json) {
                    window.location.href = an_login_obj.home_url;

                } else {
                    message.innerHTML = json;
                }
            })
            .catch(err => {
                console.log(`Error: ${err}`)
            })
    });
});