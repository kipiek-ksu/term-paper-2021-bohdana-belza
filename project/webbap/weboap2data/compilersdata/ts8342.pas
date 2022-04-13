Program R5Z3;



Var n,i:integer;

    k:real;



Begin

     read(n);

     k:=1;

     for i:=1 to n do

         k:=k*(1+1/sqr(i));

     Write(k:0:3);

End.