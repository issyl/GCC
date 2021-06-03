import React, { Component } from "react";
import logo from "../img/GCC logo.png";
import line from "../img/Line.png";
// import twitch from "../img/twitch.png";
// import google from "../img/google.png";
// import twitter from "../img/twitter.png";
// import steam from "../img/steam.png";
import "./signUp.css";
import { Link, Redirect } from "react-router-dom";

class signUp extends Component {
    render() {
        const twitchClick = () => {
            window.location.href = "https://twitch.com";
        };

        const gooogleClick = () => {
            window.location.href = "https://google.com";
        };

        const twitterClick = () => {
            window.location.href = "https://twitter.com";
        };

        const steamClick = () => {
            window.location.href = "https://store.steampowered.com/";
        };
        return (
            <div id="signUp">
                <div className="backgroundSignIn">
                    <img className="logo" src={logo}></img>
                    <h1>SIGN UP</h1>
                    <h3>to Continue to LLL</h3>
                    <form className="formSignUp">
                        <div className="formSection space">
                            <label className="formText">NAME</label>
                            <input
                                className="formInput"
                                type="text"
                                name="name"
                            />
                        </div>
                        <div className="formSection space">
                            <label className="formText">TEAM</label>
                            <input
                                className="formInput"
                                type="text"
                                name="name"
                            />
                        </div>
                        <div className="formSection space">
                            <label className="formText">USERNAME</label>
                            <input
                                className="formInput"
                                type="text"
                                name="name"
                            />
                        </div>
                        <div className="formSection space">
                            <label className="formText">EMAIL</label>
                            <input
                                className="formInput"
                                type="text"
                                name="name"
                            />
                        </div>
                        <div className="formSection space">
                            <label className="formText">PASSWORD</label>
                            <input
                                className="formInput"
                                type="password"
                                name="password"
                            />
                        </div>
                        <button
                            className="formButton"
                            type="submit"
                            name="signUp"
                        >
                            SIGN UP
                        </button>
                        <Link to="/signIn">
                            <a>have an account? Sign In here</a>
                        </Link>
                        <img src={line} className="formSeparation"></img>
                    </form>
                    
                </div>
            </div>
        );
    }
}

export default signUp;
