<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://www.paypal.com/sdk/js?client-id=AUu2CpCBrva4gbNjqB5IvdV16V93hPLgumgyL7iJgQPs64Rdrp35EepAGDE8GtDlZIwg7i44FrGDY8Eq"></script>

    <title>PayPal</title>


</head>

<body>
    <div id="paypalCard"></div>

    <script>
        function setPaypal() {
            document.querySelector("#paypalCard").innerHTML = "";
            // var paypal;
            // try {
            //     paypal = loadScript({
            //         "client-id": "AUu2CpCBrva4gbNjqB5IvdV16V93hPLgumgyL7iJgQPs64Rdrp35EepAGDE8GtDlZIwg7i44FrGDY8Eq",
            //     });
            // } catch (error) {
            //     console.error("failed to load the PayPal JS SDK script", error);
            // }
            console.log("ssss")
            if (paypal) {
                console.log("ssss")
                try {
                    paypal
                        .Buttons({
                            createOrder: function(data, actions) {
                                // This function sets up the details of the transaction, including the amount and line item details.
                                return actions.order.create({
                                    purchase_units: [{
                                        description: "Super Course",
                                        amount: {
                                            value: 30.0,
                                        },
                                    }, ],
                                    application_context: {
                                        shipping_preference: "NO_SHIPPING",
                                    },
                                });
                            }.bind(this),
                            onApprove: function(data, actions) {
                                console.log("Order Created! " + data.orderID)

                                fetch('/paypal/process/' + data.orderID, {
                                        method: 'POST', // or 'PUT'
                                    }).then(res => res.json())
                                    .then(response => {
                                        console.log('Success:', response)
                                        console.log('Success:', response.status)
                                    });

                            }.bind(this),
                        })
                        .render("#paypalCard");
                } catch (error) {
                    console.error("failed to render the PayPal Buttons", error);
                }
            }
        }
        setPaypal();
    </script>

</body>

</html>