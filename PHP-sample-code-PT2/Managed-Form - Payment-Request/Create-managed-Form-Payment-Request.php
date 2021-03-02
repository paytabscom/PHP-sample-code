<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Managed Form</title>

    <script src="https://secure.paytabs.com/payment/js/paylib.js"></script>
</head>

<body>


<form action="Send-managed-form.php" id="paymentform" method="post">
    <span id="errors"></span>

    <div class="row">
        <label>Card Number</label>
        <input type="text" data-paylib="number" maxlength="20" id="card" value="4111 1111 1111 1111">
    </div>

    <div class="row">
        <label>Expiry Date (MM/YYYY)</label>
        <input type="text" data-paylib="expmonth" maxlength="2" value="12">
        <input type="text" data-paylib="expyear" maxlength="4" value="2029">
    </div>

    <div class="row">
        <label>Security Code</label>
        <input type="text" data-paylib="cvv" maxlength="4" value="123">
    </div>

    <br>
    <div class="row">
        <label>Cart ID</label>
        <input type="text" name="cart_id" value="cart_1323">
    </div>
    <div class="row">
        <label>Amount</label>
        <input type="number" min="1" name="amount" value="1000">
    </div>
    <div class="row">
        <label>Currency</label>
        <input type="text" name="currency" value="AED">
    </div>

    <br>
    <div class="row">
        <label>name</label>
        <input type="text" name="name" value="First Last">
    </div>
    <div class="row">
        <label>email</label>
        <input type="text" name="email" value="mail@email.com">
    </div>
    <div class="row">
        <label>phone</label>
        <input type="text" name="phone" value="010868398432">
    </div>
    <div class="row">
        <label>street</label>
        <input type="text" name="street1" value="street1">
    </div>
    <div class="row">
        <label>Country</label>
        <input type="text" name="country" value="AE">
    </div>
    <div class="row">
        <label>State</label>
        <input type="text" name="state" value="Dubai">
    </div>
    <div class="row">
        <label>city</label>
        <input type="text" name="city" value="Dubai">
    </div>
    <div class="row">
        <label>Post code</label>
        <input type="number" name="postcode" value="12345">
    </div>

    <br>
    <input type="submit" value="Pay">
</form>


<script type="text/javascript">
    var form = document.getElementById('paymentform');
    paylib.inlineForm({
        'key': 'C7KM2D-HTRD62-DPTRQR-2VB69R',
        'form': form,
        'autoSubmit': true,
        'callback': function (response) {
            document.getElementById('errors').innerHTML = '';
            if (response.error) {
                paylib.handleError(form, document.getElementById('errors'), response);
            }
        }
    });
</script>


</body>

</html>