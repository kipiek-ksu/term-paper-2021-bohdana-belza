program zad6_15;
var
   i,j,m,kol:integer;
   a:array[1..255]of integer;
   mas:array[1..255,1..255]of integer;
begin
     read(m);
     for I:=1 to m do
         read(a[i]);
     for i:=1 to m do
         for j:=1 to m do
             READ(mas[i,j]);
     kol:=0;
     for i:=1 to m do
         for j:=1 to m do
             if (a[j]>0) and (mas[i,j]<0) then kol:=kol+1;
     write(kol);
