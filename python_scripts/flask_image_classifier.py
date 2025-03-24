from flask import Flask, request, jsonify
import tensorflow as tf 
from tensorflow.keras.models import load_model 
import numpy as np
from PIL import Image
import io
from flask_cors import CORS  # Allow frontend to communicate with backend

# Initialize Flask app
app = Flask(__name__)
CORS(app)  # Enable CORS for cross-origin requests

# Load the trained Keras model
MODEL_PATH = r"C:\RAJA\my_model.keras"  # Use raw string format
try:
    model = load_model(MODEL_PATH)
    print("Model loaded successfully!")
except Exception as e:
    print(f"Error loading model: {e}")
    exit()

# Define class labels (update this based on your model's classes)
class_labels = ["Apple", "Banana", "Cherry", "Date", "Elderberry"]  # Example classes

# Preprocess image function
def preprocess_image(image):
    image = image.resize((224, 224))  # Resize to model's expected input size
    image = np.array(image) / 255.0  # Normalize pixel values
    image = np.expand_dims(image, axis=0)  # Add batch dimension
    return image

# API endpoint to accept image and return prediction
@app.route("/predict", methods=["POST"])
def predict():
    try:
        if "image" not in request.files:
            return jsonify({"error": "No image provided"}), 400
        
        # Get the uploaded file
        image_file = request.files["image"]
        file_name = image_file.filename  # Get the file name
        
        # Read image for processing
        image = Image.open(image_file)
        processed_image = preprocess_image(image)

        # Make prediction
        predictions = model.predict(processed_image)
        predicted_class = np.argmax(predictions[0])  # Get highest probability class
        predicted_label = class_labels[predicted_class]
        confidence = float(np.max(predictions[0]))

        return jsonify({
            "file_name": file_name,
            "predicted_class": predicted_label,
            "confidence": confidence
        })

    except Exception as e:
        return jsonify({"error": str(e)}), 500

# Run Flask app
if __name__ == "__main__":
    app.run(debug=True, port=5000)
