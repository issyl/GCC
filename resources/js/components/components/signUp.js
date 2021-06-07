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
    // constructor() {
    //     super();

    //     this.state = {
    //         name: "",
    //         team: "",
    //         username: "",
    //         email: "",
    //         password: "",
    //     };

    //     this.createPlayer = this.createPlayer.bind(this);
    // }

    // createPlayer(event) {
    //     event.preventDefault();

    //     const player = {
    //         name: this.state.name,
    //         team: this.state.team,
    //         username: this.state.username,
    //         email: this.state.email,
    //         password: this.state.password,
    //     };
    //     axios
    //         .post("/api/createPlayer", player)
    //         .then((response) => {
    //             this.setState({
    //                 name: "",
    //             });
    //         })
    //         .catch((error) => {
    //             console.log(error);
    //         });
    // }

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
                    <form className="formSignUp" onSubmit={createPlayer}>
                        <div className="formSection space">
                            <label className="formText">NAME</label>
                            <input
                                className="formInput"
                                type="text"
                                name="name"
                                value={this.state.name}
                            />
                        </div>
                        <div className="formSection space">
                            <label className="formText">TEAM</label>
                            <input
                                className="formInput"
                                type="text"
                                name="team"
                                value={this.state.team}
                            />
                        </div>
                        <div className="formSection space">
                            <label className="formText">USERNAME</label>
                            <input
                                className="formInput"
                                type="text"
                                name="username"
                                value={this.state.username}
                            />
                        </div>
                        <div className="formSection space">
                            <label className="formText">EMAIL</label>
                            <input
                                className="formInput"
                                type="text"
                                name="email"
                                value={this.state.email}
                            />
                        </div>
                        <div className="formSection space">
                            <label className="formText">PASSWORD</label>
                            <input
                                className="formInput"
                                type="password"
                                name="password"
                                value={this.state.password}
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
