<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Payment Integration</title>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
</head>
<body>
    <h1>Razorpay Payment Integration</h1>
    <form id="paymentForm">
        <input type="number" id="amount" name="num" placeholder="Enter Amount" required>
        <input type="button" value="Submit" id="payButton" onclick="payNow()">
    </form>

    <script>
        function payNow() {
            var amount = document.getElementById('amount').value;
            if (!amount || amount <= 0) {
                alert('Please enter a valid amount');
                return;
            }

            console.log("Amount to be sent: " + amount); // Debugging log

            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'cheakout.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function () {
                if (xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    if (response.error) {
                        alert('Error: ' + response.error);
                        return;
                    }

                    var options = {
                        "key": response.key,
                        "amount": response.amount,
                        "currency": "INR",
                        "name": response.name,
                        "description": "Test Transaction",
                        "order_id": response.order_id,
                        "handler": function (response) {
                            console.log(response);
                            alert('Payment Successful');
                        },
                        "theme": {
                            "color": "#F37254"
                        }
                    };
                    var rzp = new Razorpay(options);
                    rzp.open();
                } else {
                    alert('Something went wrong. Please try again. Status: ' + xhr.status);
                }
            };
            xhr.send('num=' + encodeURIComponent(amount));
        }
    </script>
</body>
</html>
