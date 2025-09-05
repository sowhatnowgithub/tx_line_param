import json
import pandas as pd
from sklearn.model_selection import train_test_split
from sklearn.ensemble import RandomForestRegressor
from sklearn.metrics import r2_score, mean_squared_error
import numpy as np
    
df = pd.DataFrame(data)

# Features (inputs) and Targets (outputs you want to predict)
X = df[["Alpha", "Beta", "Yo", "ReflectionMag", "ReflectionPhase", "D"]]
y = df[["ReYd", "ImgYd", "ReYt", "ImgYt"]]

# Split train/test
X_train, X_test, y_train, y_test = train_test_split(X, y, test_size=0.2, random_state=42)

# Train simple model
model = RandomForestRegressor(n_estimators=300, random_state=42)
model.fit(X_train, y_train)

# Evaluate
y_pred = model.predict(X_test)
r2 = r2_score(y_test, y_pred)
mse = mean_squared_error(y_test, y_pred)

print(f"R² Score: {r2:.4f}")
print(f"MSE: {mse:.6f}")
