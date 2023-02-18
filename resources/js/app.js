import Alpine from 'alpinejs'
import focus from "@alpinejs/focus";
import './../../vendor/power-components/livewire-powergrid/dist/powergrid'

window.Alpine = Alpine;

window.url = document.querySelector("meta[name='url']").getAttribute("content");
window.csrf = document.querySelector("meta[name='csrf-token']").getAttribute("content");

Alpine.plugin(focus);
Alpine.plugin(AlpineFloatingUI)

Alpine.start();

window.checkoutComplete = function (data) {
    var checkoutId = data.checkout.id;

    Paddle.Order.details(checkoutId, function (data) {
        // Order data, downloads, receipts etc... available within 'data' variable.
        document.getElementById("fullscreenLoaderMessage").innerText =
            "Finishing Up Your Order";
        document.getElementById("fullscreenLoader").classList.remove("hidden");
        axios
            .post("/checkout", {
                _token: csrf,
                checkout_id: data.checkout.checkout_id,
            })
            .then(function (response) {
                console.log(response);
                if (parseInt(response.data.status) == 1) {
                    let queryParams = "";
                    if (parseInt(response.data.guest) == 1) {
                        queryParams = "?complete=true";
                    }
                    window.location = "/checkout/welcome" + queryParams;
                }
            });
    });
};

window.checkoutUpdate = function (data) {
    if (data.checkout.completed) {
        window.$wireui.notify({
            title: "Info saved!",
            description: "Your payment info has been successfully updated.",
            icon: "success",
        });
    } else {
        window.$wireui.notify({
            title: "Error!",
            description:
                "Sorry, there seems to be a problem updating your payment info",
            icon: "error",
        });
    }
};

window.checkoutCancel = function (data) {
    let subscriptionId = data.checkout.id;
    axios
        .post("/cancel", { _token: csrf, id: subscriptionId })
        .then(function (response) {
            if (parseInt(response.data.status) == 1) {
                window.location = "/settings/subscription";
            }
        });
};
