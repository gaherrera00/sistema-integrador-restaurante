<div class="nav">
    <div class="logo">
        <img src="./img/GUSTEAU'S 2.png" alt="logo">
    </div>
    <ul class="register-link">
        <li>
            <p><a href="home">Home</a></p>
        </li>
        <li>
            <p><a href="Sobre Nós">Sobre Nós</a></p>
        </li>
        <li>
            <p><a href="Contact">Contato</a></p>
        </li>
    </ul>
</div>

<style>
    .nav {
        height: 145px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: rgb(154, 59, 59);
        padding: 20px 40px;
    }

    .logo img {
        max-width: 200px;
        height: auto;
    }

    .register-link {
        display: flex;
        justify-content: center;
        gap: 3rem;
        list-style: none;
        padding: 0;
        margin: 0;
        flex-grow: 1;
        justify-self: center;
    }

    .register-link li {
        display: inline-block;
        margin-left: 100px;
    }

    .register-link p a {
        color: white;
        text-decoration: none;
        font-weight: 600;
        font-size: large;
        position: relative;
        padding: 5px 0;
    }

    .register-link p a::after {
        content: "";
        position: absolute;
        width: 0;
        height: 2px;
        background-color: #ffffff;
        bottom: -3px;
        left: 50%;
        transition: width 0.4s ease, left 0.4s ease;
    }

    .register-link p a:hover::after {
        width: 100%;
        left: 0;
        background-color: darkred;
    }
</style>