from flask import Flask, request, jsonify

import pandas as pd

app = Flask(__name__)

# Load the book dataset from Excel
books_df = pd.read_excel("books.xlsx")

# Function to fetch book details
def get_book_details(title):
    book = books_df[books_df["Title"].str.lower().str.contains(title.lower(), na=False)]
    if not book.empty:
        book_info = book.iloc[0]  # Get the first matching book
        return {
            "title": book_info["Title"],
            "author": book_info["Author"],
            "genre": book_info["Genre"],
            "price": book_info["Price (INR)"]
        }
    return None

# API Route for Chatbot
@app.route('/chatbot', methods=['POST'])
def chatbot():
    data = request.json
    user_input = data.get("query", "").lower()

    book_details = get_book_details(user_input)
    if book_details:
        response = f"📚 **{book_details['title']}** by {book_details['author']} \n📝 Genre: {book_details['genre']} \n💰 Price: ₹{book_details['price']}"
    else:
        response = "Sorry, I couldn't find that book. Please try another title!"

    return jsonify({"response": response})

if __name__ == '__main__':
    app.run(debug=True)
