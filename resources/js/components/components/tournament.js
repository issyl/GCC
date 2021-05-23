import React, { Component } from "react";
import { BrowserRouter as Router, Switch, Route, Link } from "react-router-dom";
import apexLegend from "../img/apex.svg";
import valorant from "../img/valorant.svg";
import axios from "axios";
import "./tournament.css";

class tournament extends Component {
    constructor() {
        super();

        this.state = {
            Tournaments: [],
        };
    }

    componentWillMount() {
        axios
            .get("/api/tournaments")
            .then((response) => {
                this.setState({
                    Tournaments: response.data,
                });
            })
            .catch((error) => {
                console.log(error);
            });
    }

    render() {
        const { Tournaments } = this.state;
        return (
            <div id="tournament">
                <div className="tournamentLeftContent">
                    <div className="subLeftContent">
                        <div className="gameMenu">
                            <img className="imgGameMenu" src={apexLegend}></img>
                            <img className="imgGameMenu" src={valorant}></img>
                        </div>
                        <div className="mainContent">
                            <div className="contentMenu">
                                <a>ACTIVE TOURNAMENT</a>
                                <a>FINISHED TOURNAMENT</a>
                            </div>
                            <div className="tournamentTable">
                                    {Tournaments.map((Tournaments) => (
                                        <Link
                                            className="tournamentTableContent"
                                            to={`/${Tournaments.id}`}
                                            key={Tournaments.id}
                                        >
                                            <h1>{(Tournaments.name).toUpperCase()}</h1>
                                            <h1>{Tournaments.date}</h1>
                                            <h1>{Tournaments.prize}</h1>
                                        </Link>
                                    ))}
                            </div>
                        </div>
                    </div>
                </div>
                <div className="tournamentRightContent">
                    <h1>
                        ARE YOU BRAVE ENOUGH TO SHOW THE WORLD WHO IS THE
                        CHAMPION? SIGN UP NOW!
                    </h1>
                    <Link to="/signUp">
                        <button>Join Now</button>
                    </Link>
                </div>
            </div>
        );
    }
}

export default tournament;
