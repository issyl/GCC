import React from "react";
import "./navBar.css";
import { Link } from "react-router-dom";

const navBar = () => {
    return (
        <section id="navBar">
            <div className="navPosition">
                <a href="/" className="navText">
                    Home
                </a>
                <a href="/guide" className="navText">
                    Guide
                </a>
                <Link to="/tournament">
                    <p className="navText">Tournament</p>
                </Link>
                <Link to="/signIn" className="btnPosition">
                    <button className="signIn">SIGN IN</button>
                </Link>
                <p className="navText">or</p>
                <a href="#" className="btnPosition">
                    <button className="signUp">
                        <p className="btnText">Sign Up</p>
                    </button>
                </a>

                {/* <button className="signUp">
          <a href="#" className="navText">Sign Up</a>
        </button> */}
            </div>
        </section>
    );
};

export default navBar;
