import streamlit as st
import pandas as pd


# Security
#passlib,hashlib,bcrypt,scrypt
import hashlib
def make_hashes(password):
    return hashlib.sha256(str.encode(password)).hexdigest()

def check_hashes(password,hashed_text):
    if make_hashes(password) == hashed_text:
        return hashed_text
    return False
# DB Management
import sqlite3 
conn = sqlite3.connect('data.db')
c = conn.cursor()
# DB  Functions
def create_usertable():
    c.execute('CREATE TABLE IF NOT EXISTS userstable(username TEXT,password TEXT)')


def add_userdata(username,password):
    c.execute('INSERT INTO userstable(username,password) VALUES (?,?)',(username,password))
    conn.commit()

def login_user(username,password):
    c.execute('SELECT * FROM userstable WHERE username =? AND password = ?',(username,password))
    data = c.fetchall()
    return data


def view_all_users():
    c.execute('SELECT * FROM userstable')
    data = c.fetchall()
    return data



def main():
    """OCULAR DISEASES RECONGNITION SYSTEM"""

    st.title("OCULAR DISEASES RECONGNITION SYSTEM")

    menu = ["Login","SignUp"]
    choice = st.sidebar.selectbox("Menu",menu)

    if choice == "Login":

        username = st.sidebar.text_input("User Name")
        password = st.sidebar.text_input("Password",type='password')
        if st.sidebar.checkbox("Login"):
            # if password == '12345':
            create_usertable()
            hashed_pswd = make_hashes(password)

            result = login_user(username,check_hashes(password,hashed_pswd))
            if result:

                st.success("Logged In as {}".format(username))
                # Custom imports 
                import tensorflow as tf
                import numpy as np
                from PIL import Image, ImageOps

                st.title("Image Classification")
                upload_file = st.sidebar.file_uploader("Upload images", type = 'jpg')
                generate_pred = st.sidebar.button("predict")
                model = tf.keras.models.load_model('CVN.h5')
                def import_n_pred(image_data, model):
                    size = (224,224)
                    image = ImageOps.fit(image_data, size, Image.ANTIALIAS)
                    img = np.asarray(image)
                    reshape = img[np.newaxis,...]
                    pred = model.predict(reshape)
                    return pred
                if generate_pred:
                    image = Image.open(upload_file)
                    with st.expander('image', expanded=True):
                        st.image(image, use_column_width=True)
                    pred = import_n_pred(image, model)
                    labels = ['Cataract' , 'Normal']
                    st.title("The result in CVN model is {}".format(labels[np.argmax(pred)]))
                    
                    if (np.argmax(pred)==1):
                        model = tf.keras.models.load_model('GVN.h5')
                        pred = import_n_pred(image, model)
                        labels = ['Glaucoma' , 'Normal']
                        st.title("The result in GVN model is {}".format(labels[np.argmax(pred)]))
                        
                        if (np.argmax(pred)==1):
                            model = tf.keras.models.load_model('MVN.h5')
                            pred = import_n_pred(image, model)
                            labels = ['Myopia' , 'Normal']
                            st.title("The result in MVN model is {}".format(labels[np.argmax(pred)]))
                            
                            if (np.argmax(pred)==1):
                                model = tf.keras.models.load_model('HVN.h5')
                                pred = import_n_pred(image, model)
                                labels = ['Normal', 'Hypertensive']
                                st.title("The result in HVN model is {}".format(labels[np.argmax(pred)]))


                
            else:
                st.warning("Incorrect Username/Password")





    elif choice == "SignUp":
        st.subheader("Create New Account")
        new_user = st.text_input("Username")
        new_password = st.text_input("Password",type='password')

        if st.button("Signup"):
            create_usertable()
            add_userdata(new_user,make_hashes(new_password))
            st.success("You have successfully created a valid Account")
            st.info("Go to Login Menu to login")



if __name__ == '__main__':   	
    main()