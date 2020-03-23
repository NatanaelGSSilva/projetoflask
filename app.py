from flask import Flask, render_template, request, redirect, flash
from flask_sqlalchemy import SQLAlchemy


app = Flask(__name__)
app.config['SECRET_KEY'] = 'Y0ur Secret Key Xmsnsnkd8939'
app.config['SQLALCHEMY_DATABASE_URI'] = 'sqlite:///database/mercado.db'
app.config['SQLALCHEMY_TRACK_MODIFICATIONS'] = False
db = SQLAlchemy(app)


class Produto(db.Model):
    __tablename__ = 'produtos'
    id = db.Column(db.Integer, primary_key=True)
    nome = db.Column(db.String(80), nullable=False)
    marca = db.Column(db.String(40), nullable=False)
    quant = db.Column(db.Integer)
    preco = db.Column(db.Float)

    def __repr__(self):
        return '<Produto %r>' % self.nome


@app.route('/')
def principal():
    return render_template('index.html')


@app.route('/cadastro', methods=['GET', 'POST'])
def cadastro():
    if request.method == 'POST':
        # obtém os dados do form
        nome = request.form['nome']        
        marca = request.form['marca']        
        quant = request.form['quant']        
        preco = request.form['preco']        

        produto = Produto(nome=nome, 
                          marca=marca, 
                          quant=quant, 
                          preco=preco)        
        
        db.session.add(produto)
        db.session.commit()
        flash(f'Ok! Produto {nome} cadastrado com sucesso!!')
        return redirect('/listagem')        
    return render_template('cadastro.html')


@app.route('/listagem')
def listagem():
    produtos = Produto.query.all()
    return render_template('listagem.html', produtos=produtos)


@app.route('/balanco')
def balanco():
    return render_template('balanco.html')


@app.route('/teste')
def teste():
    return '<h2>Aula 2: Cadastro de Dados</h2>'


if __name__ == '__main__':
    app.run(debug=True)
