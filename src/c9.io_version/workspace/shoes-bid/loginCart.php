<style>
    .linkReg{
    	color:darkgray;
    }
</style>

<!-- # Right Side Cart Area # -->
<div class = "cart-bg-overlay"></div>

<div class = "right-side-cart-area">
    <!-- Cart Button -->
    <div class = "cart-button">
        <a href = "#" id = "rightSideCart"><img src = "img/core-img/user.svg" alt = ""> </a>
    </div>

    <div class = "cart-content d-flex">
        <!-- Cart Summary -->
        <div class = "cart-amount-summary">
    		<form action = 'checkLogin.php' method = 'post'>
                <h2>Login</h2>
                <div>
                    <div class = "col-md6 mb-3">
                        <label>User Name</label>
                        <br>
                        <input class = "form-control" type = 'text' name = 'userName' />
                    </div>
                    <div class = "col-md6 mb-3">
                        <label>Password</label>
                        <br>
                        <input class = "form-control" type = 'password' name = 'password'/>
                    </div>
                    <div class = "col-md6 mb-3">
                        New account? <a href = 'register.php' class = 'linkReg'>Register</a>
                    </div>
                </div>
                <div class = "checkout-btn mt-100">				
    			    <input type = 'submit' class = "btn essence-btn" value = 'Login'>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- # Right Side Cart End # -->