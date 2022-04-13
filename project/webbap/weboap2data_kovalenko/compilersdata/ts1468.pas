Program Uliya_15;
Var n,x:integer;r:real;.
     function degree(x:integer;n:integer):integer;
    var
      i:integer;
      a:integer;
    begin a:=1;
    for i:=1 to n do
    a:=a*x;
  degree:=a;
  end;
  begin
  read(n,x);
    r:=degree(x,degree(n,3))/degree(3,n);
    write(r:0:3);
    end.