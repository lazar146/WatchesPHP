<form name='prijava' id='prijava'>
    <h2>Contact</h2>
    <div class='forma'>
        <label>First name:</label></br>
        <input type='text' id='ime' name='ime' placeholder='Name..'>
        <p class='sakrij greskap'></p>
    </div>
    <div class='forma'>
        <label>Last name:</label></br>
        <input type='text' id='prezime' name='prezime' placeholder='Last name..'>
        <p class='sakrij greskap'></p>
    </div>


    <div class='forma'>
        <label>Email:</label></br>
        <input type='email' id='mejl' name='mejl' placeholder='Email..'>
        <p class='sakrij greskap'></p>
    </div>








    <div class='forma'>
        <div>
            <div id='rad1'>
                <input type='radio' name='Rb1' id='Stak' value='Male' />
                <label for='Stak'>
                    Male
                </label>
            </div>
            <div id='rad1'>

                <input type='radio' name='Rb1' id='Ogl' value='Female' />
                <label for='Ogl'>
                    Woman
                </label>
            </div>

        </div>
        <p class='sakrij greskap'></p>
    </div>
    </br>
    <div class='forma'>
        <div>
            <div id='rad2'>
                <input type='checkbox' value='Problem' id='cck' name='chd' />
                <label for='cck'>
                    Problem
                </label>
            </div>



            <div id='rad2'>
                <input type='checkbox' value='Suggestion' id='cck' name='chd' />
                <label for='cck'>
                    Suggestion
                </label>
            </div>



            <div id='rad2'>
                <input type='checkbox' value='Feedback' id='cck' name='chd' />
                <label for='cck'>
                    Feedback
                </label>
            </div>

        </div>
        <p class='sakrij greskap'></p>
    </div>

    </br>
    <div class='forma'>
        <label>Message:</label></br>
        <textarea id='pisi' name='pisi' placeholder='Your message..'></textarea>
        <p class='sakrij greskap'></p>
        <p id='brojkar' class='kraj1'></p>
    </div>

    <input type='button' id='dugme' value='Submit'>
    <p class='sakrij kraj'></p>
</form></div>