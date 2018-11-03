@extends ('layout')

@section('pageHead')
<title>EZshare - Receipt</title>
<style>
    body{
    color: #1e3f5a;
    }
    h1{
    padding: 10px;
    }
</style>

@endsection



@section('content')



<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>A simple, clean, and responsive HTML invoice template</title>

    <style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }

    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }

    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }

    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }

    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }

    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }

    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }

    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }

    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }

    .invoice-box table tr.item td{
        border-bottom: 1px solid #eee;
    }

    .invoice-box table tr.item.last td {
        border-bottom: none;
    }

    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }

    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }

        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }

    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }

    .rtl table {
        text-align: right;
    }

    .rtl table tr td:nth-child(2) {
        text-align: left;
    }
    </style>
</head>
<!-- Receipt template based on template from https://github.com/sparksuite/simple-html-invoice-template -->
<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="{{ asset('/img') }}/logo.png" style="width:100%; max-width:300px;">
                            </td>

                            <td>
                                EZshare Invoice:<br>
                                Created: {{session()->get('fdatetime')}}<br>
                                Due: {{session()->get('fdatetime')}}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                EZshare<br>
                                123EZshareHQ<br>
                                East Coburg VIC 3021
                            </td>

                            <td>
                                {{session()->get('fname')}} {{session()->get('lname')}}<br>
                                {{session()->get('email')}}<br>
                                {{session()->get('phone')}}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="heading">
                <td>
                    Payment Method
                </td>

                <td>

                </td>
            </tr>

            <tr class="details">
                <td>
                    PayPal
                </td>

                <td>
                  <!-- PayPal Logo --><a href="https://www.paypal.com/webapps/mpp/paypal-popup" title="How PayPal Works" onclick="javascript:window.open('https://www.paypal.com/webapps/mpp/paypal-popup','WIPaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1060, height=700'); return false;"><img src="https://www.paypalobjects.com/webstatic/mktg/logo/pp_cc_mark_37x23.jpg" border="0" alt="PayPal Logo"><!-- PayPal Logo -->
                </td>
            </tr>

            <tr class="heading">
                <td>
                    Item
                </td>

                <td>
                    Price
                </td>
            </tr>

            <tr class="item last">
                <td>
                    Hiring Car from {{session()->get('fdatetime')}} to {{session()->get('tdatetime')}}
                </td>

                <td>
                    ${{session()->get('gtotal')}}
                </td>
            </tr>

            <tr class="total">
                <td></td>

                <td>
                   Total: ${{session()->get('gtotal')}}
                </td>
            </tr>
        </table>
        <button class="btn btn-primary" onclick="printpage()">Print this receipt</button>
        <button class="btn btn-primary" onclick="bookings()">View all bookings</button>
    </div>
    <script>
function printpage() {
    //Prints the receipt
    window.print();
}

function bookings() {
  //Redirects the user to my account page
  window.location.replace("/myAccount");

}
</script>
</body>
</html>
@endsection
