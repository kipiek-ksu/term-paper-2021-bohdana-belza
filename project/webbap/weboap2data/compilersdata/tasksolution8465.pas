Type arr=array[1..99] of real;
var a,b,c,d:arr;
    n,m:integer;

Procedure Vvod(k:integer; var mass:arr);
Var l:integer;
Begin
     for l:=1 to k do
         read(mass[l]);
End;

Procedure look(k:integer; var mass:arr);
Var l,h:integer;
    min:real;
Begin
     min:=mass[1];
     h:=1;
     for l:=2 to k do
        if mass[l]<min
           then
               begin
                    min:=mass[1];
                    h:=l;
               end;
     for l:=h+1 to k do
         mass[l]:=21.05;
End;

Procedure Vuvod(k:integer; var mass:arr);
Var l:integer;
Begin
     for l:=1 to k do
         Write(mass[l]:0:2,' ');
     writeln;
End;


BEGIN
    readln(n,m);
    vvod(n,a);
    vvod(m,b);
    look(n,a);
    look(m,b);
    vuvod(n,a);
    vuvod(m,b);
END.