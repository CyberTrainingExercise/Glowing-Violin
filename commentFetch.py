import os
from flask import Flask, jsonify
import pandas as pd
import mysql.connector

mydb = mysql.connector.connect(
    host = 'localhost',
    user = 'webadmin',
    password = '',
    database = 'website'
)

app = Flask(__name__)

@app.route('commentFetch', methods=['GET'])

def commentFetch():
    postNum = 2
    query = 'SELECT users.username, comments.content FROM comments join users on comments.poster_id = users.user_id where comments.post_id = '+str(postNum)
    mycursor = mydb.cursor()
    mycursor.execute(query)
    result = mycursor.fetchall()
    return jsonify(result)

if __name__ == '__main__':
    app.run()