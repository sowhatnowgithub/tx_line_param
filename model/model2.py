

import json
import numpy as np
import matplotlib.pyplot as plt
from sklearn.model_selection import train_test_split
from sklearn.ensemble import RandomForestRegressor
from sklearn.metrics import mean_squared_error, r2_score, mean_absolute_error

# ---------------- Load Data ----------------
with open("dataset.json", "r") as f:
    data = json.load(f)

X, y = [], []

for row in data:
    X.append([
        row["Alpha"],
        row["Beta"],
        row["Yo"],
        row["ReflectionMag"],
        row["ReflectionPhase"],
        row["ReYt"],
        row["ImgYt"]
    ])
    y.append(row["D"])

X, y = np.array(X), np.array(y)

# ---------------- Split Train/Test ----------------
X_train, X_test, y_train, y_test = train_test_split(
    X, y, test_size=0.2, random_state=42
)

# ---------------- Train Model ----------------
model = RandomForestRegressor(n_estimators=300, random_state=42)
model.fit(X_train, y_train)

# ---------------- Predictions ----------------
y_pred = model.predict(X_test)

# ---------------- Metrics ----------------
mse = mean_squared_error(y_test, y_pred)
mae = mean_absolute_error(y_test, y_pred)
r2 = r2_score(y_test, y_pred)

# Custom Accuracy %
accuracy = np.mean(100 * (1 - np.abs((y_pred - y_test) / y_test)))

print("📊 Model2 Results (Predicting D):")
print(f"R² Score: {r2:.4f}")
print(f"Mean Squared Error: {mse:.6f}")
print(f"Mean Absolute Error: {mae:.6f}")
print(f"Custom Accuracy: {accuracy:.2f}%")

# ---------------- Plot Accuracy ----------------
plt.figure(figsize=(12,5))

# Scatter Plot (Predicted vs Actual)
plt.subplot(1,2,1)
plt.scatter(y_test, y_pred, alpha=0.6, color="blue")
plt.plot([min(y_test), max(y_test)], [min(y_test), max(y_test)], color="red")
plt.xlabel("Actual D")
plt.ylabel("Predicted D")
plt.title("Actual vs Predicted D")

# Error Distribution
plt.subplot(1,2,2)
errors = y_pred - y_test
plt.hist(errors, bins=30, color="orange", alpha=0.7)
plt.xlabel("Prediction Error")
plt.ylabel("Frequency")
plt.title("Error Distribution")

plt.tight_layout()
plt.show()

