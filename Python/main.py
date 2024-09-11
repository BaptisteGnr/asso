# Fichier Classe Site
class Site:
    """
    Variable: Path, liste de bloc, 

    Méthode: Open, Ajout, Btn
    """


    def __init__(self, Titre):
        self.path = 'Base/index.html'
        self.path2 = 'Base/index2.html'
        self.file = self.Open()
        self.Title = Titre

    def Open(self):
        """
        Ouvre le fichier et renvoie un tableau avec chaque ligne pour 1 index
        """
        with open(self.path) as f:
            return f.readlines()

    def ChangeTitle(self):
        i = 0
        var = False
        
        while var == False:
            if '<title>' in self.file[i]:
                self.file[i] = f'<title>{self.Title}</title>'
                return self.file
            else:
                i+=1

    def build(self):
        f = open(self.path2, "w")
        for j in self.file:
            f.write(j)
        f.close()
        
       

if __name__ == '__main__':
    c = Site(Titre = 'Test123')
    c.ChangeTitle()
    c.build()

