echo "Git - Comita tudo do diretório corrente"

if [ $# -ne 1 ]
then
	echo 'Informe a mensagem'
  echo './git-commita-tudo.sh "Mensagem do Commit"'
	exit 1
fi

MENSAGEM = $1

echo "Status:"
git status

echo "Adicionando mudanças"
git add -A

echo "Commitando"
git commit -m "$MENSAGEM"

echo "Enviando ao servidor"
git push

#final
