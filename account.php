<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <title>İdeal Kilo</title>
</head>
<body>
    <div class="container">

        <?php session_start(); ?>
        <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']) : ?>
            <a href="/">
			<h2 class="center">Merhaba <?php echo $_SESSION['username'] ?></h2>
		</a>
    </div>
    <header>
        <?php
            require_once(__DIR__.'./navbar.php');
        ?>
    </header>
    <div class="container">
        <form method="POST">
            <div class="form-group">
                <input type="text" class="form-control" id="height" name="height" placeholder="Boyunuzu Girin" required>
            </div>
            <fieldset class="form-group">
                <div class="row">
                <legend class="col-form-label col-sm-2 pt-0">Cinsiyet</legend>
                <div class="col-sm-10">
                    <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="male" value="male" checked>
                    <label class="form-check-label" for="gridRadios1">
                        Erkek
                    </label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" id="famale" value="famale">
                    <label class="form-check-label" for="gridRadios2">
                        Bayan
                    </label>
                    </div>
                </div>
                </div>

            </fieldset>
            <fieldset class="form-group">
                <div class="row">
                <legend class="col-form-label col-sm-2 pt-0">Formül</legend>
                <div class="col-sm-10">
                <select class="custom-select mr-sm-2" id="formul" name="formul">
                    <option selected>Formül Seçin</option>
                    <option value="1">Robinson</option>
                    <option value="2">Miller</option>
                </select>
                </div>
                </div>
            </fieldset>
            <button type="submit" name="submit" class="btn btn-primary">Hesapla</button>
            <span>
				<?php
					if (isset($_POST['submit'])) {
						echo 'İdeal Kilonuz: ';
						switch ($_POST['gender']) {
							case 'male':
								switch ($_POST['formul']) {
									case '1':
										echo 52 + ($_POST['height']-150)/(2.54)* 1.9;;
										break;
									case '2':
										echo 56.2 + ($_POST['height']-150)/(2.54)* 1.41;
										break;
								}
								break;

							case 'famale':
								switch ($_POST['formul']) {
									case '1':
										echo 49 + ($_POST['height']-150)/(2.54)* 1.7;
										break;
									
									case '2':
										echo 53.1 + ($_POST['height']-150)/(2.54)* 1.36;
										break;
								}
								break;
							
							default:
								echo 'Desteklenmeyen cinsel kimlik';
								break;
						}
					}
					$_POST['submit'] = null;
				?>
			</span>
        </form>
        <?php else : ?>
		<h2>Girş Yapmadınız</h2>
	    <?php endif; ?>
    </div>
    <footer>
        alt kısım
    </footer>
</body>
</html>