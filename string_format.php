<?php
$self = $_SERVER['PHP_SELF'];

$entry = "";
if (isset($_POST['save_entry'])) {
    $entry = strip_tags($_POST['entry']);
    
    $entry = remove_fword($entry);
    
}

function remove_fword($string) {
    $fword_arr = ['fuck', 'fucked', 'fuck3d', 'fucker', '4ck', '4rk', 'fucking', 'fack', 'fnck', 'fncking', 'shit', 'damn', 'motherfucker', 'motherfuck3r', 'damnit', 'damit', 'dammit'];
    $length_arr = [2 => '**', 3 => '***', 4 => '****', 5 => '*****', 6 => '******', 7 => '*******', 8 => '********', 9 => '*********', 10 => '**********', 11 => '***********', 12 => '************'];
    
    $new_array = [];
    $entry_array = explode(' ',$string);
    foreach($entry_array as $word) {
        foreach($fword_arr as $fword) {
            if (preg_match("/\s*$fword\s*/i", $word)) {
                $word_len = strlen($word);
                if ($word_len > 12) {
                    $word = "<span style='color: red'>*f word not allowed*</span>";
                    // Removing duplicate f word
                    for ($i = 0; $i < count($new_array) - count($new_array) * 2; $i++) {
                        if ($new_array[$i] == $word) {
                            $new_array[] = $word;
                        }
                    }
                } else {
                    $word = $length_arr[strlen($word)];
                    // Removing duplicate f word
                    for ($i = 0; $i < count($new_array) - count($new_array) * 2; $i++) {
                        if ($new_array[$i] == $word) {
                            $new_array[] = $word;
                        }
                    }
                }
            }
        }
        $new_array[] = $word;
    }
    $new_string = implode(' ', $new_array);
    return $new_string;
}

?>

<!DOCTYPE html>
    <head>
        <meta charset="utf-8" />
        <title>String Format</title>
        <link rel="stylesheet" href="css/bootstrap.css" />
        <script src="jquery/jquery-3.5.1.min.js"></script>
        <script>
            //$(init);
            //function init() {
            //    $("#entry_value").bind('input',function(){
            //        if ($(this).val() == 'fuck') {
            //            $(this).val("****");
            //        }
            //    });
            //}
        </script>
    </head>
    <body>
        <div class="container mt-5">
            <h1 class='text-center'>STRING FORMATTING</h1>
            <p>Formatted String: <br />
            <?php echo $entry; ?>
            </p>
            <form class="form" method="POST" action="<?php echo $self; ?>">
                <div class="form-group row">
                    <label class="col-form-label">Enter Text</label>
                    <textarea class="form-control" id="entry_value" name='entry' cols="20" rows="7" required='required'></textarea>
                </div>
                <div class='form-group text-center'>
                    <a class='btn btn-success' href="<?php echo $self; ?>">Reset</a>
                    <input class='btn btn-primary' type='submit' name='save_entry' value='Save Entry' />
                </div>
            </form>
        </div>
    </body>