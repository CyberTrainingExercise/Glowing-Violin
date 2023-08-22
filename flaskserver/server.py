import cors
import os
from cors import App 
from flask import request, jsonify
import json

app=cors.App

@App.route("/", methods=["GET", "POST"])
def sample_api():
    data = {
            "post1" : [
                {
                    "username": "Poe T. Ato",
                    "text": "Great post, Bear! 📉📉📉😮",
                    "timestamp": "1 hour ago",
                },
            ],
            "post2" : [],
            "post3" : [],
            "post4" : [],
            "post5" : [],
        }
    return jsonify(data)

if __name__=="__main__":
    app.run(debug=True, host='0.0.0.0', port=int(os.environ.get("PORT", 8080)))