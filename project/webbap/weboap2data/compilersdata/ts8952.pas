program _3_6;
VAR
   a:array[1..100,1..100] of integer;
   m,n,i,j:integer;
Begin
     read(m,n);
     for i:=1 to m do
     begin
          for j:=1 to n do
          a[j,i]:=i+2*j;
     end;
     for j:=1 to m do
     begin
     for i:=1 to n do
     write(a[i,j],' ');
     writeln;
     end;
end.