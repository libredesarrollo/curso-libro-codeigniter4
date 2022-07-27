<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://www.paypal.com/sdk/js?client-id=YOUR_CLIENT_ID&components=YOUR_COMPONENTS"></script>

    <title>Document</title>


</head>

<body>
    <div id="paypalCard"></div>

    <script>
        function setPaypal() {
            document.querySelector("#paypalCard").innerHTML = "";
            let paypal;
            try {
                paypal = await loadScript({
                    "client-id": window.Laravel.clientPaypal,
                });
            } catch (error) {
                console.error("failed to load the PayPal JS SDK script", error);
            }

            if (paypal) {
                try {
                    await paypal
                        .Buttons({
                            createOrder: function(data, actions) {
                                // This function sets up the details of the transaction, including the amount and line item details.
                                return actions.order.create({
                                    purchase_units: [{
                                        description: this.course.title,
                                        amount: {
                                            value: this.price,
                                        },
                                    }, ],
                                    application_context: {
                                        shipping_preference: "NO_SHIPPING",
                                    },
                                });
                            }.bind(this),
                            onApprove: function(data, actions) {
                                this.$router.replace({
                                    name: "inscribe-success",
                                    params: {
                                        slug: this.$route.params.slug,
                                        orden: data.orderID,
                                        coupon: this.coupon,
                                    },
                                });
                            }.bind(this),
                        })
                        .render("#paypalCard");
                } catch (error) {
                    console.error("failed to render the PayPal Buttons", error);
                }
            }
        }
    </script>

</body>

</html>