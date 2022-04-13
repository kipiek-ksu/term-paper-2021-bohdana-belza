Program N;
var i,j,n:integer; a,b,c:array[1..50,1..50]of real;
Begin
     readln(n);
     for i:=1 to n do
     begin
          for j:=1 to n do
          begin
               read(a[i,j]);
          end;
          readln;
     end;
     for i:=1 to n do
     begin
          for j:=1 to n do
          begin
               if j<i
               then
               begin
                    b[i,j]:=a[j,i];
                    c[i,j]:=-a[j,i];
               end
               else
               begin
                    b[i,j]:=a[i,j];
                    c[i,j]:=a[i,j];
               end;
          end;
     end;
     for i:=1 to n do
     begin
          for j:=1 to n do
              write(b[i,j]:0:2,' ');
          writeln;
     end;
     for i:=1 to n do
     begin
          for j:=1 to n do
              write(c[i,j]:0:2,' ');
          writeln;
     end;
End.