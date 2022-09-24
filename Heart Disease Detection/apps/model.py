#pip install streamlit
#pip install pandas
#pip install sklearn


# IMPORT STATEMENTS
import streamlit as st
import pandas as pd
from PIL import Image
import numpy as np
import matplotlib.pyplot as plt
import plotly.figure_factory as ff
from sklearn.metrics import accuracy_score
from sklearn.ensemble import RandomForestClassifier
from sklearn.model_selection import train_test_split
import seaborn as sns


def app():
  df = pd.read_csv(r'C:\Users\LENOVO\Desktop\Github\Project\Heart Disease Detection\Dataset\Heart_Disease-Dataset.csv')

  # HEADINGS
  st.title('Heart Disease Detection')
  st.sidebar.header('Patient Data')
  st.subheader('Training Data Stats')
  st.write(df.describe())


  # X AND Y DATA
  x = df.drop(['target'], axis = 1)
  y = df.iloc[:, -1]
  x_train, x_test, y_train, y_test = train_test_split(x,y, test_size = 0.2, random_state = 0)


  # FUNCTION
  def user_report():
    age = st.sidebar.slider('Age', 0,100, 63 )
    sex = st.sidebar.slider('Sex ( 0 for Female & 1 for Male )', 0, 1, 1)
    cp = st.sidebar.slider('Chest Pain', 0, 5, 3 )
    trestbps = st.sidebar.slider('Resting Blood Pressure', 0, 200, 145 )
    chol = st.sidebar.slider('Cholesterol', 0, 500, 233 )
    fbs = st.sidebar.slider('Fasting Blood Pressure', 0, 1, 1)
    restecg = st.sidebar.slider('Rest ECG Test', 0, 1, 0 )
    thalach = st.sidebar.slider('Maximum Heart Rate', 0, 200, 150 )
    exang = st.sidebar.slider('Exercise Induced Angina', 0, 1, 0)
    oldpeak = st.sidebar.slider(' ST Depression Induced', 0, 5, 3)
    slope = st.sidebar.slider('Angiographic Severity', 0, 2, 0 )
    ca = st.sidebar.slider('Calcium ', 0, 4, 0)
    thal = st.sidebar.slider('Thalassemia', 0, 3, 1 )
    

    user_report_data = {
        'cp': cp,
        'trestbps': trestbps,
        'chol': chol,
        'fbs': fbs,
        'restecg': restecg,
        'thalach': thalach,
        'exang': exang,
        'oldpeak': oldpeak,
        'slope': slope,
        'ca': ca,
        'thal': thal,
        'sex': sex,
        'age':age
    }
    report_data = pd.DataFrame(user_report_data, index=[0])
    return report_data




  # PATIENT DATA
  user_data = user_report()
  st.subheader('Patient Data')
  st.write(user_data)




  # MODEL
  rf  = RandomForestClassifier()
  rf.fit(x_train, y_train)
  user_result = rf.predict(user_data)



  # VISUALISATIONS
  st.title('Visualised Patient Report')



  # COLOR FUNCTION
  if user_result[0]==0:
    color = 'blue'
  else:
    color = 'red'


  #Age vs CP
  st.header('Chest Pain Count Graph (Others vs Yours)')
  fig_preg = plt.figure()
  ax1 = sns.scatterplot(x = 'age', y = 'cp', data = df, hue = 'target', palette = 'Greens')
  ax2 = sns.scatterplot(x = user_data['age'], y = user_data['cp'], s = 150, color = color)
  plt.xticks(np.arange(0,101, 10))
  plt.yticks(np.arange(0, 5, 1))
  plt.title('0 - Healthy & 1 - Unhealthy')
  st.pyplot(fig_preg)



  #Age vs trestbps
  st.header('Resting Blood Pressure Graph (Others vs Yours)')
  fig_preg = plt.figure()
  ax1 = sns.scatterplot(x = 'age', y = 'trestbps', data = df, hue = 'target', palette = 'Greens')
  ax2 = sns.scatterplot(x = user_data['age'], y = user_data['trestbps'], s = 150, color = color)
  plt.xticks(np.arange(0,101, 10))
  plt.yticks(np.arange(80, 201, 10))
  plt.title('0 - Healthy & 1 - Unhealthy')
  st.pyplot(fig_preg)



  #Age vs chol
  st.header('Cholesterol Graph (Others vs Yours)')
  fig_preg = plt.figure()
  ax1 = sns.scatterplot(x = 'age', y = 'chol', data = df, hue = 'target', palette = 'Greens')
  ax2 = sns.scatterplot(x = user_data['age'], y = user_data['chol'], s = 150, color = color)
  plt.xticks(np.arange(0,101, 10))
  plt.yticks(np.arange(100, 501, 50))
  plt.title('0 - Healthy & 1 - Unhealthy')
  st.pyplot(fig_preg)


  #Age vs thalach
  st.header('Maximum Heart Rate Graph (Others vs Yours)')
  fig_preg = plt.figure()
  ax1 = sns.scatterplot(x = 'age', y = 'thalach', data = df, hue = 'target', palette = 'Greens')
  ax2 = sns.scatterplot(x = user_data['age'], y = user_data['thalach'], s = 150, color = color)
  plt.xticks(np.arange(0,101, 10))
  plt.yticks(np.arange(80, 201, 10))
  plt.title('0 - Healthy & 1 - Unhealthy')
  st.pyplot(fig_preg)


 #Age vs thal
  st.header('Thalassemia Graph (Others vs Yours)')
  fig_preg = plt.figure()
  ax1 = sns.scatterplot(x = 'age', y = 'thal', data = df, hue = 'target', palette = 'Greens')
  ax2 = sns.scatterplot(x = user_data['age'], y = user_data['thal'], s = 150, color = color)
  plt.xticks(np.arange(0,101, 10))
  plt.yticks(np.arange(0, 4, 1))
  plt.title('0 - Healthy & 1 - Unhealthy')
  st.pyplot(fig_preg)


  # OUTPUT
  st.subheader('Your Report: ')
  output=''
  if user_result[0]==0:
    output = 'Patient do not have Heart Disease'
  else:
    output = 'Patient do have Heart Disease'
  st.title(output)

