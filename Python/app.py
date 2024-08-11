from flask import Flask, request, jsonify
import joblib
import pandas as pd

app = Flask(__name__)

# Load the model from the file
model = joblib.load('labor_cost_model.pkl')

@app.route('/')
def home():
    return "Flask server is running."

@app.route('/predict', methods=['POST'])
def predict():
    data = request.get_json(force=True)
    # Create a DataFrame from the received JSON data
    input_data = pd.DataFrame([data])
    # Make predictions
    prediction = model.predict(input_data)
    # Return the prediction as a JSON response
    return jsonify({'predicted_labor_cost': prediction[0]})

if __name__ == '__main__':
    app.run(debug=True, host='0.0.0.0', port=5000)
