Program _06_20;
const
     z=100;
var
   mas:array[1..z,1..z] of real;
   B:array[1..z] of real;
   i,j:integer;
   m:integer;
   n:integer;
begin
     read(m);
     read(n);
     for i:=1 to m do
     for j:=1 to n do
         read(mas[i,j]);

     for i:=1 to m do
     begin
          b[i]:=1;
          for j:=1 to n do
              b[i]:=b[i]*mas[i,j];
     end;

     for i:=1 to m-1 do
         write(b[i]:0:2,' ');
     write(b[m]:0:2);
end.