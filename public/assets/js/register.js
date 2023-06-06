window.addEventListener("DOMContentLoaded", function () {
    let form = document.getElementById("frontend-register-form");
    let message = document.getElementById("frontend-login-register-message");

    form.addEventListener("submit", function (e) {
        e.preventDefault();

        let data = new FormData(form);
        let parseData = new URLSearchParams(data);

        fetch(`${an_register_obj.rest_url}/register`,
            {
                method: "POST",
                body: parseData
            })
            .then(res => res.json())
            .then(json => {
                console.log(json);
                if (json) {
                    window.location.href = an_register_obj.home_url;

                } else {
                    message.innerHTML = json;
                }
            })
            .catch(err => {
                console.log(`Error: ${err}`)
            })
    });
});