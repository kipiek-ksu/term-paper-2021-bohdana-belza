program t6z6;
var n:integer;

procedure make(n:integer);
var a:array [1..100,1..100] of real;
    b:array [1..100,1..100] of real;
    c:array [1..100.1..100] of real;
      i,j:integer;
      k,l:integer;
begin
    for i:=1 to n do
      begin
          for j:=1 to n do
          begin
              writeln('A[',i,' ',j,']= ');
              read(a[i,j]);
          end;
      end;

      for i:=1 to n do
      begin
          for j:=1 to n do
          begin
              if j>=i then
               b[i,j]:=a[i.j];
              if j<i then
              begin
                  Aijji;
                  b[i,j]:=z[k,l];
                  c[i,j]:=z[k,l];
              end;
              if



          end;
      end;
end;


procedure Aijji(i,j,n:integer; a:array[1..100,1..100] of real);
var z:;array [1..100,1..100] of real;
  k,l:integer;

begin
    for i:=1 to n do
    begin
        for j:=1 to n do
        begin
            k:=i;
            l:=j;
            z[k,l]:=a[i,j];
        end;
    end;

end;




procedure doB(n:integer; a:array [1..100,1..100] of real);
var b:array [1..100,1..100] of real;
    i,j:integer;
begin
    for i:=1 to n do
      begin
          for j:=1 to n do
          begin
              if j>=i then
               b[i,j]:=a[i,j];
              if j<i then
               b[i,j]:=a[j,i];
          end;
      end;
end;



begin
    readln(n);
    make;



end.