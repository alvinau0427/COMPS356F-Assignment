<html>
    <title></title>
    <head></head>
    <body>
        <form action = '#' method = 'post'>
            <table>
                <tr>
                    <td>Product Name</td>
                    <td><input type = 'text' name = 'addProdName'/></td>
                </tr>
                <tr>
                    <td>Duration</td>
                    <td><input type='text' name='addProdDur'/>day(s)</td>
                </tr>
                <tr>
                    <td>Minimum Price</td>
                    <td>$<input type='text' name='addProdMinPrice'/></td>
                </tr>
                <tr>
                    <td>Payment Method</td>
                    <td>
                        <select>
                            <option value='credit'>Credit Card</option>
                            <option value='bank'>Bank Transfer</option>
                            <option value='paypal'>Paypal</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                </tr>
            </table>
        </form>
    </body>
</html>