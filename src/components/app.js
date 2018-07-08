import React from 'react';

export default class App extends React.Component {

    constructor(props) {
        super(props);

        this.state = {
            data: [],
        };
    }

    componentDidMount() {
        fetch('http://localhost:8888?route=blog/index')
            .then(response => response.json())
            .then(data => this.setState({ data }));
    }

    render() {
        const { data } = this.state;
        console.log(data);
        return (
            <div>
                <div className="container">

                    <div className="row">

                        <div className="col-md">

                            <h1 className="my-4">Blogs
                            </h1>
                            {data.map(blog=>
                                <div key={blog.id} className="card mb-4">
                                    <img className="card-img-top" src="http://placehold.it/750x300" alt="Card image cap"/>
                                    <div className="card-body">
                                        <h2 className="card-title">{blog.title}</h2>
                                        <p className="card-text">{blog.text}</p>
                                        <a href="#" className="btn btn-primary">Read More &rarr;</a>
                                    </div>
                                    <div className="card-footer text-muted">
                                        Posted on January 1, 2017 by
                                        <a href="#">Start Bootstrap</a>
                                    </div>
                                </div>
                            )}


                        </div>

                    </div>

                </div>

                <footer className="py-5 bg-dark">
                    <div className="container">
                        <p className="m-0 text-center text-white">Copyright &copy; blogs 2018</p>
                    </div>
                </footer>
            </div>
        );
    }
}