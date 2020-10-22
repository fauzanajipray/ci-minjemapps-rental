<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="<?= base_url('assets/')?>css/nice-select.css">
    <script src="<?= base_url('assets/')?>jquery/jquery3.3.1.min.js"></script> 
    <script src="<?= base_url('assets/')?>js/autoNumeric.js"></script> 
</head>
<style>
    
</style>
<body>
    <h1>Kemana Kita akan pergi</h1>
    <select>
        <option data-display="Select">Nothing</option>
        <option value="1">Some option</option>
        <option value="2">Another option</option>
        <option value="3" disabled>A disabled option</option>
        <option value="4">Potato</option>
    </select>

    
    <script src="<?= base_url('assets/')?>jquery/jquery3.3.1.min.js"></script>
    <script src="<?= base_url('assets/js/')?>jquery.nice-select.js"></script>
    <script>
        $(document).ready(function() {
            $('select').niceSelect();
            console.log('s');
        });
    </script>

    <input class="testInput" type="text" value="6"/>
    <input class="testInput" type="text" value="7"/>
    <input class="testInput" type="text" value="8"/>

    </body>
    </html>

    <script type="text/javascript">
    
    $(".testInput").autoNumeric('init', {
        aSep: '.', 
        aDec: ',',
        aForm: true,
        vMax: '999999999',
        vMin: '-999999999'
    });
</script>
</body>
</html>