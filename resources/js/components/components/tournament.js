import React, { Component } from "react";
import { BrowserRouter as Router, Switch, Route, Link } from "react-router-dom";
import apexLegend from "../img/apex.svg";
import valorant from "../img/valorant.svg";
import axios from "axios";

class tournament extends Component {
    // constructor() {
    //     super();

    //     this.state = {
    //         tournaments: [],
    //     };
    // }

    // componentDidMount() {
    //     axios.get("/tournaments").then((response) => {
    //         this.setState({
    //             tournaments: response.data,
    //         });
    //     });
    // }

    render() {
        // const { tournaments } = this.state;
        return (
            <div className="tournamet">
                <div className="tournamentRightContent">
                    <h1>
                        ARE YOU BRAVE ENOUGH TO SHOW THE WORLD WHO IS THE
                        CHAMPION? SIGN UP NOW!
                    </h1>
                    <Link to="/signUp">
                        <button>Join Now</button>
                    </Link>
                </div>
                <div className="tournamentLeftContent">
                    <div className="gameMenu">
                        <img className="imgGameMenu" src={apexLegend}></img>
                        <img className="imgGameMenu" src={valorant}></img>
                    </div>
                    <div className="subNav">
                        <a>ACTIVE TOURNAMENT</a>
                        <a>FINISHED TOURNAMENT</a>
                    </div>
                    <table className="tournamentTable">
                        <tr>
                            <th>Name</th>
                            <th>Date</th>
                            <th>Prize</th>
                        </tr>
                        {/* <tr>
                            {tournaments.map((tournaments) => (
                                <Link
                                    className=""
                                    to={`/${tournaments.id}`}
                                    key={tournaments.id}
                                >
                                    {tournaments.name}
                                    <th>{tournaments.name}</th>
                                    <th>{tournaments.date}</th>
                                    <th>{tournaments.prize}</th>
                                </Link>
                            ))}
                        </tr> */}
                    </table>
                </div>
            </div>
        );
    }
}

export default tournament;
