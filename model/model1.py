

import json
import pandas as pd
from sklearn.model_selection import train_test_split
from sklearn.ensemble import RandomForestRegressor
from sklearn.metrics import r2_score, mean_squared_error, mean_absolute_error
import numpy as np
import matplotlib.pyplot as plt

# ---------------- Load dataset ----------------
with open("dataset.json", "r") as f:
    data = json.load(f)

df = pd.DataFrame(data)

# Features (X) include ReYd & ImgYd too
X = df[["Alpha", "Beta", "Yo", "ReflectionMag", "ReflectionPhase", "D", "ReYd", "ImgYd"]]
y = df[["ReYt", "ImgYt"]]

# ---------------- Split ----------------
X_train, X_test, y_train, y_test = train_test_split(
    X, y, test_size=0.2, random_state=42
)

# ---------------- Train ----------------
model = RandomForestRegressor(n_estimators=300, random_state=42)
model.fit(X_train, y_train)

# ---------------- Predict ----------------
y_pred = model.predict(X_test)

# ---------------- Metrics ----------------
r2 = r2_score(y_test, y_pred, multioutput="uniform_average")
mse = mean_squared_error(y_test, y_pred)
mae = mean_absolute_error(y_test, y_pred)

# Custom Accuracy % (element-wise)
accuracy = np.mean(
    100 * (1 - np.abs((y_pred - y_test) / (y_test + 1e-9)))  # avoid div by zero
)

print("📊 Model1 Results (Predicting Yt):")
print(f"R² Score: {r2:.4f}")
print(f"MSE: {mse:.6f}")
print(f"MAE: {mae:.6f}")
print(f"Custom Accuracy: {accuracy:.2f}%")

# ---------------- Plot ----------------
fig, axes = plt.subplots(1, 2, figsize=(12, 5))
targets = ["ReYt", "ImgYt"]

for i, ax in enumerate(axes.flatten()):
    ax.scatter(y_test.iloc[:, i], y_pred[:, i], alpha=0.6, color="blue")
    ax.plot(
        [y_test.iloc[:, i].min(), y_test.iloc[:, i].max()],
        [y_test.iloc[:, i].min(), y_test.iloc[:, i].max()],
        color="red"
    )
    ax.set_xlabel(f"Actual {targets[i]}")
    ax.set_ylabel(f"Predicted {targets[i]}")
    ax.set_title(f"Actual vs Predicted {targets[i]}")

plt.tight_layout()
plt.show()

# Error distribution for both outputs combined
errors = y_pred - y_test.values
plt.figure(figsize=(8, 5))
plt.hist(errors.flatten(), bins=40, color="orange", alpha=0.7)
plt.xlabel("Prediction Error")
plt.ylabel("Frequency")
plt.title("Error Distribution (Yt)")
plt.show()

